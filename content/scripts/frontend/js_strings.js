"use strict";
var _a = window.wp.i18n, __ = _a.__, _x = _a._x, _n = _a._n, sprintf = _a.sprintf;
var edu_i18n_strings = {
    ErrorMessages: {
        ///40 = Not enough spots left. See ErrorDetails
        ///45 = Person already booked. See ErrorDetails
        40: _x('Not enough spots left.', 'frontend', 'eduadmin-booking'),
        45: _x('Person already booked.', 'frontend', 'eduadmin-booking'),
        100: _x('Invalid voucher code, check code.', 'frontend', 'eduadmin-booking'),
        101: _x('The voucher is not valid during the event period', 'frontend', 'eduadmin-booking'),
        102: _x('The voucher is too small for the number of participants', 'frontend', 'eduadmin-booking'),
        103: _x('Invalid voucher code, check code.', 'frontend', 'eduadmin-booking'),
        104: _x('Invalid voucher code, check code.', 'frontend', 'eduadmin-booking'),
        105: _x('The voucher is not valid for this event', 'frontend', 'eduadmin-booking'),
        200: _x('Person added on session where dates are overlapping.', 'frontend', 'eduadmin-booking'),
        300: _x('Contact person must have a unique username to be able to login.', 'frontend', 'eduadmin-booking'),
        301: _x('Please enter all required fields on the contact person.', 'frontend', 'eduadmin-booking'),
        MissingSetupForBookingForm: _x('Configuration needed for the booking forms to work', 'frontend', 'eduadmin-booking')
    },
    ValidationErrors: {
        "ContactPerson.FirstName": _x('Contact person, first name', 'frontend', 'eduadmin-booking'),
        "ContactPerson.LastName": _x('Contact person, last name', 'frontend', 'eduadmin-booking'),
    },
    Generic: {
        ValidationError: _x('Validation errors, please check your fields', 'backend', 'eduadmin-booking'),
        Close: _x('Close', 'frontend', 'eduadmin-booking'),
        UnnamedParticipant: function (number) {
            return sprintf(_n('One unnamed participant', '%s unnamed participants', number, 'eduadmin-booking'), number);
        }
    },
    ExportTable: {
        CourseName: _x('Course name', 'frontend', 'eduadmin-booking'),
        ParticipantName: _x('Participant name', 'frontend', 'eduadmin-booking'),
        StartDate: _x('Start date', 'frontend', 'eduadmin-booking'),
        EndDate: _x('End date', 'frontend', 'eduadmin-booking'),
        OnDemand: _x('On-demand', 'frontend', 'eduadmin-booking'),
        BookingDate: _x('Booking date', 'frontend', 'eduadmin-booking'),
        Arrived: _x('Arrived', 'frontend', 'eduadmin-booking'),
        Grade: _x('Grade', 'frontend', 'eduadmin-booking')
    },
    VAT: {
        inc: _x('inc VAT', 'frontend', 'eduadmin-booking'),
        ex: _x('ex VAT', 'frontend', 'eduadmin-booking'),
        free: _x('VAT free', 'frontend', 'eduadmin-booking')
    }
};
