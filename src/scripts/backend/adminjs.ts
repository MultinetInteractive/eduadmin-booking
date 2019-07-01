declare const availText: {
	exactNumbers: string;
	onlyText: string;
	intervals: string;
	alwaysFewSpots: string;
};

var EduAdmin = {
	UnlockApiAuthentication: function() {
		const apiKey = document.getElementById(
			"eduadmin-api-key"
		) as HTMLInputElement;
		apiKey.readOnly = false;

		const unlock = document.getElementById(
			"edu-unlockButton"
		) as HTMLElement;
		unlock.style.display = "none";
	},
	ToggleAttributeList: function(item: string) {
		var me = jQuery(item);
		me.find(".eduadmin-attributelist").slideToggle("fast");
	},
	ToggleVisibility: function(visible: boolean, selector: string) {
		if (visible) jQuery(selector).show();
		else jQuery(selector).hide();
	},
	SpotExampleText: function() {
		const selVal = jQuery(
			".eduadmin-spotsLeft :selected"
		).val() as keyof typeof availText;
		jQuery("#eduadmin-spotExampleText").text(availText[selVal]);
		jQuery("#eduadmin-intervalSetting").hide();
		jQuery("#eduadmin-alwaysFewSpots").hide();
		switch (selVal) {
			case "intervals":
				jQuery("#eduadmin-intervalSetting").show();
				break;
			case "alwaysFewSpots":
			case "onlyText":
				jQuery("#eduadmin-alwaysFewSpots").show();
				break;
			default:
				break;
		}
	},
	ListSettingsSetFields: function() {}
};
