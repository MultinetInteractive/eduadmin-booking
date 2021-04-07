<?php
function render_question( $question, $multiple = false, $suffix = '' ) {
	$t = EDU()->start_timer( __METHOD__ );
	switch ( $question['QuestionType'] ) {
		case 'Text':
			edu_render_text_question( $question, $multiple, $suffix );
			break;
		case 'Checkbox':
			edu_render_checkbox_question( $question, $multiple, $suffix );
			break;
		case 'Radiobutton':
			edu_render_radio_question( $question, $multiple, $suffix );
			break;
		case 'Numeric':
			edu_render_number_question( $question, $multiple, $suffix );
			break;
		case 'Textarea':
			edu_render_note_question( $question, $multiple, $suffix );
			break;
		case 'Info':
			edu_render_info_text( $question );
			break;
		case 'Date':
			edu_render_date_question( $question, $multiple, $suffix );
			break;
		case 'Dropdown':
			edu_render_drop_list_question( $question, $multiple, $suffix );
			break;
		default:
			EDU()->write_debug( $question );
			break;
	}
	EDU()->stop_timer( $t );
}

function edu_render_note_question( $question, $multiple, $suffix ) {
	echo '<label class="edu-question-note questionanswer_id_' . esc_attr( $question['AnswerId'] ) . '">';
	echo '<div class="inputLabel noteQuestion">' . esc_html( wp_strip_all_tags( $question['QuestionText'] ) ) . ( ! empty( $question['Price'] ) ? ' <i class="priceLabel">(' . esc_html( edu_get_price( $question['Price'], $question['VatPercent'] ) ) . ')</i>' : '' ) . '</div>';
	echo '<div class="inputHolder">';
	echo '<textarea autocomplete="off" placeholder="' . esc_attr( $question['QuestionText'] ) . '"';
	if ( $multiple ) {
		echo ' data-replace="name|index"';
		echo ' data-name-template="question_' . esc_attr( $question['AnswerId'] . '_note' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
	}
	echo ' name="question_' . esc_attr( $question['AnswerId'] . '_note' . ( '' !== $suffix ? '-' . $suffix : '' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) ) . '"';
	echo ' data-type="note"';
	echo ' onchange="eduBookingView.UpdatePrice();"';
	echo ' data-price="' . esc_attr( $question['Price'] ) . '"';
	echo( $question['Mandatory'] ? ' data-required="true"' : '' );
	echo ' resizable="resizable" class="questionNoteField" rows="3">';
	echo esc_textarea( $question['DefaultAnswer'] );
	echo '</textarea>';
	echo '</div></label>';
}

function edu_render_checkbox_question( $question, $multiple, $suffix ) {
	echo '<div class="edu-question-checkbox questionanswer_id_q' . esc_attr( $question['QuestionId'] ) . '">';
	echo '<div class="inputLabel checkBoxQuestion noHide">' . esc_html( wp_strip_all_tags( $question['QuestionText'] ) ) . '</div>';
	foreach ( $question['Alternatives'] as $q ) {
		echo '<label>';
		echo '<div class="inputHolder">';
		echo '<input type="checkbox" class="questionCheck" data-type="check" data-price="' . esc_attr( $q['Price'] ) . '"';
		echo ' onchange="eduBookingView.UpdatePrice();"';
		if ( $multiple ) {
			echo ' data-replace="name|index"';
			echo ' data-name-template="question_' . esc_attr( $question['AnswerId'] . '_check' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
		}
		echo ' name="question_' . esc_attr( $q['AnswerId'] . '_check' . ( '' !== $suffix ? '-' . $suffix : '' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) ) . '"' . ( $question['Mandatory'] ? ' data-required="true"' : '' ) . ' value="' . esc_attr( $q['AnswerId'] ) . '" /> ';
		echo esc_html( wp_strip_all_tags( $q['AnswerText'] ) );
		if ( ! empty( $q['Price'] ) ) {
			echo ' <i class="priceLabel">(' . esc_html( edu_get_price( $q['Price'], $question['VatPercent'] ) ) . ')</i>';
		}
		echo '</div>';
		echo '</label>';
	}
	echo '</div>';
}

function edu_render_date_question( $question, $multiple, $suffix ) {
	echo '<label class="edu-question-date questionanswer_id_' . esc_attr( $question['AnswerId'] ) . '">';
	echo '<div class="inputLabel noHide">';
	echo esc_html( wp_strip_all_tags( $question['QuestionText'] ) ) . ( ! empty( $question['Price'] ) ? ' <i class="priceLabel">(' . esc_html( convert_to_money( $question['Price'] ) ) . ')</i>' : '' );
	echo '</div>';
	echo '<div class="inputHolder">';
	echo '<input type="date" autocomplete="off" class="questionDate" data-type="date" onchange="eduBookingView.UpdatePrice();"';
	echo ' data-price="' . esc_attr( $question['Price'] ) . '"' . ( $question['Mandatory'] ? ' data-required="true"' : '' );
	if ( $multiple ) {
		echo ' data-replace="name|index"';
		echo ' data-name-template="question_' . esc_attr( $question['AnswerId'] . '_date' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
	}
	echo ' name="question_' . esc_attr( $question['AnswerId'] . '_date' . ( '' !== $suffix ? '-' . $suffix : '' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) ) . '" />';
	if ( $question['HasTimeField'] ) {
		echo '<input type="time" onchange="eduBookingView.UpdatePrice();" class="questionTime"' . ( $question['Mandatory'] ? ' data-required="true"' : '' );
		if ( $multiple ) {
			echo ' data-replace="name|index"';
			echo ' data-name-template="question_' . esc_attr( $question['AnswerId'] . '_time' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
		}
		echo ' name="question_' . esc_attr( $question['AnswerId'] . '_time' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) . '" />';
	}
	echo '</div>';
	echo '</label>';
}

function edu_render_drop_list_question( $question, $multiple, $suffix ) {
	echo '<label class="edu-question-droplist questionanswer_id_' . esc_attr( $question['AnswerId'] ) . '">';
	echo '<div class="inputLabel noHide">';
	echo esc_html( wp_strip_all_tags( $question['QuestionText'] ) );
	echo '</div>';
	echo '<div class="inputHolder">';
	echo '<select class="questionDropdown" autocomplete="off" onchange="eduBookingView.UpdatePrice();"' . ( $question['Mandatory'] ? ' data-required="true"' : '' );
	if ( $multiple ) {
		echo ' data-replace="name|index"';
		echo ' data-name-template="question_' . esc_attr( $question['AnswerId'] . '_dropdown' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
	}
	echo ' name="question_' . esc_attr( md5( $question['QuestionText'] ) . '_dropdown' . ( '' !== $suffix ? '-' . $suffix : '' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) ) . '">';
	foreach ( $question['Alternatives'] as $q ) {
		echo '<option value="' . esc_attr( $q['AnswerId'] ) . '"' . ( $q['Selected'] ? ' selected="selected"' : '' ) . ' data-type="dropdown" data-price="' . esc_attr( $q['Price'] ) . '">';
		echo esc_html( wp_strip_all_tags( $q['AnswerText'] ) );
		if ( ! empty( $q['Price'] ) ) {
			echo ' (' . esc_html( edu_get_price( $q['Price'], $question['VatPercent'] ) ) . ')';
		}
		echo '</option>';
	}

	echo '</select>';
	echo '</div>';
	echo '</label>';
}

function edu_render_number_question( $question, $multiple, $suffix ) {
	echo '<label class="edu-question-number questionanswer_id_' . esc_attr( $question['AnswerId'] ) . '">';
	echo '<div class="inputLabel noHide">';
	echo esc_html( wp_strip_all_tags( $question['QuestionText'] ) );
	echo '</div>';
	echo '<div class="inputHolder">';
	echo '<input type="number" autocomplete="off" class="questionText" onchange="eduBookingView.UpdatePrice();"' . ( $question['Mandatory'] ? ' data-required="true"' : '' ) . ' data-price="' . esc_attr( $question['Price'] ) . '" min="0" data-type="number"';
	if ( $multiple ) {
		echo ' data-replace="name|index"';
		echo ' data-name-template="question_' . esc_attr( $question['AnswerId'] . '_number' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
	}
	echo ' name="question_' . esc_attr( $question['AnswerId'] . '_number' . ( '' !== $suffix ? '-' . $suffix : '' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) ) . '" placeholder="' . esc_attr_x( 'Quantity', 'frontend', 'eduadmin-booking' ) . '" />';
	if ( ! empty( $question['Price'] ) ) {
		/* translators: 1: Price */
		echo ' <i class="priceLabel">(' . esc_html( sprintf( _x( '%1$s / pcs', 'frontend', 'eduadmin-booking' ), edu_get_price( $question['Price'], $question['VatPercent'] ) ) ) . ')</i>';
	}
	echo '</div>';
	echo '</label>';
}

function edu_render_info_text( $question ) {
	if ( ! empty( $question['QuestionText'] ) ) {
		echo '<div class="edu-question-info questionanswer_id_q' . esc_attr( $question['QuestionId'] ) . '">';
		echo '<div class="inputLabel questionInfoQuestion">' . esc_html( wp_strip_all_tags( $question['QuestionText'] ) ) . '</div>';
	}
}

function edu_render_radio_question( $question, $multiple, $suffix ) {
	echo '<div class="edu-question-note questionanswer_id_q' . esc_attr( $question['QuestionId'] ) . '">';
	echo '<div class="inputLabel radioQuestion">' . esc_html( wp_strip_all_tags( $question['QuestionText'] ) ) . '</div>';
	foreach ( $question['Alternatives'] as $q ) {
		echo '<label class="questionRadioVertical">';
		echo '<div class="inputHolder">';
		echo '<input type="radio" class="questionRadio" data-type="radio"' . ( $question['Mandatory'] ? ' data-required="true"' : '' ) . ' data-price="' . esc_attr( $q['Price'] ) . '"';
		if ( $multiple ) {
			echo ' data-replace="name|index"';
			echo ' data-name-template="question_' . esc_attr( $question['QuestionId'] . '_radio' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
		}
		echo ' name="question_' . esc_attr( $question['QuestionId'] . '_radio' . ( '' !== $suffix ? '-' . $suffix : '' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) ) . '" value="' . esc_attr( $q['AnswerId'] ) . '" /> ';
		echo esc_html( wp_strip_all_tags( $q['AnswerText'] ) );
		if ( ! empty( $q['Price'] ) ) {
			echo ' <i class="priceLabel">(' . esc_html( edu_get_price( $q['Price'], $question['VatPercent'] ) ) . ')</i>';
		}
		echo '</div>';
		echo '</label>';
	}
	echo '</div>';
}

function edu_render_text_question( $question, $multiple, $suffix ) {
	echo '<label class="edu-question-text questionanswer_id_' . esc_attr( $question['AnswerId'] ) . '">';
	echo '<div class="inputLabel noHide">';
	echo esc_html( wp_strip_all_tags( $question['QuestionText'] ) ) . ( ! empty( $question['Price'] ) ? ' <i class="priceLabel">(' . esc_html( edu_get_price( $question['Price'], $question['VatPercent'] ) ) . ')</i>' : '' );
	echo '</div>';
	echo '<div class="inputHolder">';
	echo '<input type="text" autocomplete="off" data-price="' . esc_attr( $question['Price'] ) . '"' . ( $question['Mandatory'] ? ' data-required="true"' : '' ) . ' onchange="eduBookingView.UpdatePrice();" data-type="text" class="questionText"';
	if ( $multiple ) {
		echo ' data-replace="name|index"';
		echo ' data-name-template="question_' . esc_attr( $question['AnswerId'] . '_text' . ( '' !== $suffix ? '-' . $suffix : '' ) . '_{{index}}' ) . '"';
	}
	echo ' name="question_' . esc_attr( $question['AnswerId'] . '_text' . ( '' !== $suffix ? '-' . $suffix : '' ) . ( $multiple ? ( 'contact' === $suffix ? '' : '_-1' ) : '' ) ) . '" value="' . esc_attr( $question['DefaultAnswer'] ) . '" />';
	echo '</div>';
	echo '</label>';
}
