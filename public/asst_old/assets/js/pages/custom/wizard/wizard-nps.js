"use strict";

// Class definition
var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
							
				fields: {
					radios1: {
						validators: {
							notEmpty: {
								message: 'Pilih salah satu nilai yang menurut anda sesuai'
							}
						}
					},
					Checkboxes1_1: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio1_1').checked && 
									!document.getElementById('radio1_2').checked && 
									!document.getElementById('radio1_3').checked && 
									!document.getElementById('radio1_4').checked && 
									!document.getElementById('radio1_5').checked && 
									!document.getElementById('radio1_6').checked) || $('input:checkbox[name="Checkboxes1_1"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					},
					Checkboxes1_2: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio1_9').checked && 
									!document.getElementById('radio1_10').checked) || $('input:checkbox[name="Checkboxes1_2"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					}
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					radios2: {
						validators: {
							notEmpty: {
								message: 'Pilih salah satu nilai yang menurut anda sesuai'
							}
						}
					},
					Checkboxes2_1: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio2_1').checked && 
									!document.getElementById('radio2_2').checked && 
									!document.getElementById('radio2_3').checked && 
									!document.getElementById('radio2_4').checked && 
									!document.getElementById('radio2_5').checked && 
									!document.getElementById('radio2_6').checked) || $('input:checkbox[name="Checkboxes2_1"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					},
					Checkboxes2_2: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio2_9').checked && 
									!document.getElementById('radio2_10').checked) || $('input:checkbox[name="Checkboxes2_2"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					}
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					radios3: {
						validators: {
							notEmpty: {
								message: 'Pilih salah satu nilai yang menurut anda sesuai'
							}
						}
					},
					Checkboxes3_1: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio3_1').checked && 
									!document.getElementById('radio3_2').checked && 
									!document.getElementById('radio3_3').checked && 
									!document.getElementById('radio3_4').checked && 
									!document.getElementById('radio3_5').checked && 
									!document.getElementById('radio3_6').checked) || $('input:checkbox[name="Checkboxes3_1"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					},
					Checkboxes3_2: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio3_9').checked && 
									!document.getElementById('radio3_10').checked) || $('input:checkbox[name="Checkboxes3_2"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					}
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					radios4: {
						validators: {
							notEmpty: {
								message: 'Pilih salah satu nilai yang menurut anda sesuai'
							}
						}
					},
					Checkboxes4_1: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio4_1').checked && 
									!document.getElementById('radio4_2').checked && 
									!document.getElementById('radio4_3').checked && 
									!document.getElementById('radio4_4').checked && 
									!document.getElementById('radio4_5').checked && 
									!document.getElementById('radio4_6').checked) || $('input:checkbox[name="Checkboxes4_1"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					},
					Checkboxes4_2: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio4_9').checked && 
									!document.getElementById('radio4_10').checked) || $('input:checkbox[name="Checkboxes4_2"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					}
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		
		// Step 5
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					radios5: {
						validators: {
							notEmpty: {
								message: 'Pilih salah satu nilai yang menurut anda sesuai'
							}
						}
					},
					Checkboxes5_1: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio5_1').checked && 
									!document.getElementById('radio5_2').checked && 
									!document.getElementById('radio5_3').checked && 
									!document.getElementById('radio5_4').checked && 
									!document.getElementById('radio5_5').checked && 
									!document.getElementById('radio5_6').checked) || $('input:checkbox[name="Checkboxes5_1"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					},
					Checkboxes5_2: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio5_9').checked && 
									!document.getElementById('radio5_10').checked) || $('input:checkbox[name="Checkboxes5_2"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					}
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		
		// Step 6
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					radios6: {
						validators: {
							notEmpty: {
								message: 'Pilih salah satu nilai yang menurut anda sesuai'
							}
						}
					},
					Checkboxes6_1: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio6_1').checked && 
									!document.getElementById('radio6_2').checked && 
									!document.getElementById('radio6_3').checked && 
									!document.getElementById('radio6_4').checked && 
									!document.getElementById('radio6_5').checked && 
									!document.getElementById('radio6_6').checked) || $('input:checkbox[name="Checkboxes6_1"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					},
					Checkboxes6_2: {
						validators: {
							callback: {
								message: 'Pilih Perilaku yang sesuai',
								callback: function(value, validator, $field) {
									if((!document.getElementById('radio6_9').checked && 
									!document.getElementById('radio6_10').checked) || $('input:checkbox[name="Checkboxes6_2"]:checked').length > 0 ){
										return true;
									}
									return false;
								}
							}
						}
					}
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						//KTUtil.scrollTop();
						document.getElementById("kt_wizard").scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							//KTUtil.scrollTop();
							document.getElementById("kt_wizard").scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			//KTUtil.scrollTop();
			document.getElementById("kt_wizard").scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						Swal.fire({
							text: "All is good! Please confirm the form submission.",
							icon: "success",
							showCancelButton: true,
							buttonsStyling: false,
							confirmButtonText: "Yes, submit!",
							cancelButtonText: "No, cancel",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
								cancelButton: "btn font-weight-bold btn-default"
							}
						}).then(function (result) {
							if (result.value) {
								_formEl.submit(); // Submit form
							} else if (result.dismiss === 'cancel') {
								Swal.fire({
									text: "Your form has not been submitted!.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-primary",
									}
								});
							}
						});
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							//KTUtil.scrollTop();
							document.getElementById("kt_wizard").scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
						});
					}
				});
			}
						
			
		});
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initValidation();
			_initWizard();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard1.init();
});
