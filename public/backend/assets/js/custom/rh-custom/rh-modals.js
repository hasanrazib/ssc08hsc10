
// Division Add
var KTModal_division = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'division_name': {
						validators: {
							notEmpty: {
								message: 'Division Name should not be empty.'
							}

						}
					},

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_division_add');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_division_add_form');
			submitButton = document.getElementById('kt_modal_division_submit');
			cancelButton = document.getElementById('kt_modal_division_cancel');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_division.init();
});

// Division Edit
var KTModal_division_edit = function () {
	var submitButton_e;
	var cancelButton_e;
	var validator;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'division_name': {
						validators: {
							notEmpty: {
								message: 'Division Name should not be empty.'
							}

						}
					},

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton_e.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton_e.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton_e.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton_e.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton_e.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton_e.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_division_edit');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_division_edit_form');
			submitButton_e = document.getElementById('kt_modal_division_submit_e');
			cancelButton_e = document.getElementById('kt_modal_division_cancel_e');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_division_edit.init();
});



/** district modal box */

// District Add
var KTModal_district = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'division_id': {
						validators: {
							notEmpty: {
								message: 'Division Name should be selected.'
							}

						}
					},
                    'district_name': {
						validators: {
							notEmpty: {
								message: 'District Name should not be empty.'
							}

						}
					},

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_district_add');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_district_add_form');
			submitButton = document.getElementById('kt_modal_district_submit');
			cancelButton = document.getElementById('kt_modal_district_cancel');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_district.init();
});


/** end district modal box */

/** sub district modal box */

// Sub District add
var KTModal_subdistrict = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'division_id': {
						validators: {
							notEmpty: {
								message: 'Division Name should be selected.'
							}

						}
					},
                    'district_id': {
						validators: {
							notEmpty: {
								message: 'District Name should be selected.'
							}

						}
					},
                    'sub_district_name': {
						validators: {
							notEmpty: {
								message: 'Subdistrict Name should not be empty.'
							}

						}
					},

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_subdistrict_add');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_subdistrict_add_form');
			submitButton = document.getElementById('kt_modal_subdistrict_submit');
			cancelButton = document.getElementById('kt_modal_subdistrict_cancel');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_subdistrict.init();
});







// Sub District edit
var KTModal_subdistrict_e = function () {
	var submitButton;
	var cancelButton;
	var validator_e_r;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator_e_r = FormValidation.formValidation(
			form,
			{
				fields: {
					'sub_district_name': {
						validators: {
							notEmpty: {
								message: 'Subdistrict Name should not be empty.'
							}

						}
					},
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator_e_r) {
				validator_e_r.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_subdistrict_edit');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_subdistrict_edit_form');
			submitButton = document.getElementById('kt_modal_subdistrict_submit_e');
			cancelButton = document.getElementById('kt_modal_subdistrict_cancel_e');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_subdistrict_e.init();
});



// Blood Group Add
var KTModal_blood = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'blood_group': {
						validators: {
							notEmpty: {
								message: 'Blood Group Name should not be empty.'
							}

						}
					},

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_blood_add');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_blood_add_form');
			submitButton = document.getElementById('kt_modal_blood_submit');
			cancelButton = document.getElementById('kt_modal_blood_cancel');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_blood.init();
});



// marital
var KTModal_marital = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'marital_name': {
						validators: {
							notEmpty: {
								message: 'Marital Status should not be empty.'
							}

						}
					},

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_marital_add');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_marital_add_form');
			submitButton = document.getElementById('kt_modal_marital_submit');
			cancelButton = document.getElementById('kt_modal_marital_cancel');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_marital.init();
});



// marital
var KTModal_religion = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;



	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'religion_name': {
						validators: {
							notEmpty: {
								message: 'Religion should not be empty.'
							}

						}
					},

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						// Show loading indication
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;

						// Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						setTimeout(function() {
							// Remove loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							// Show popup confirmation
							Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									modal.hide();
								}
							});

							form.submit(); // Submit form
						}, 2000);
					} else {
						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form
					modal.hide(); // Hide modal
				} else if (result.dismiss === 'cancel') {
					// Show error message.
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_religion_add');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_religion_add_form');
			submitButton = document.getElementById('kt_modal_religion_submit');
			cancelButton = document.getElementById('kt_modal_religion_cancel');


			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModal_religion.init();
});
