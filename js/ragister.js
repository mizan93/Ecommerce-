jQuery.validator.addMethod("noSpace", function (value, element) {
    return value == '' || value.trim().length != 0;
}, "No space please and don't leave it empty");
jQuery.validator.addMethod("customEmail", function (value, element) {
    return this.optional(element) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
}, "Please enter valid email address!");
jQuery.validator.addMethod("alphabateonly", function (value, element) {
    return this.optional(element) || /^[a-zA-Z ]{2,30}$/.test(value);
}, "Name must be alphabetic!");
jQuery.validator.addMethod("mobileNO", function (value, element) {
    return this.optional(element) || /^(?:\+88|01)?\d{10}\r?$/.test(value);
}, "Mobile No. must be valid!");
$.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
}, "Letters, numbers, and underscores only please");
var $registrationForm = $('#registration');
if ($registrationForm.length) {
    $registrationForm.validate({
        rules: {
            name: {
                required: true,
                alphabateonly:true
            },
            //username is the name of the textbox
            username: {
                required: true,
                //alphanumeric is the custom method, we defined in the above
                alphanumeric: true,
                minlength:6,
                maxlength:10
            },
            email: {
                required: true,
                customEmail: true
            },
            password: {
                required: true
            },
            confirm: {
                required: true,
                equalTo: '#password'
            },
            mobile: {
                required: true,
                number:true,
                mobileNO:true
            
            },
            comment: {
                required: true,
            },
            fname: {
                required: true,
                noSpace:  true
            },
            lname: {
                required: true,
                noSpace: true
            },
            gender: {
                required: true
            },
            hobbies: {
                required: true
            },
            country: {
                required: true
            },
            address: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Please enter Name!'
            },
            username: {
                //error message for the required field
                required: 'Please enter username!'
            },
            email: {
                required: 'Please enter email!',
                //error message for the email field
                email: 'Please enter valid email!'
            },
            password: {
                required: 'Please enter password!'
            },
            confirm: {
                required: 'Please enter confirm password!',
                equalTo: 'Please enter same password!'
            },
            mobile: {
                required: 'Please enter Mobile!',
               number:'Please enter number value!'
               
            },
            comment: {
                required: 'Please  comment!',
            },
            gender: {
                required: 'Please select gender!',
            },
            fname: {
                required: 'Please enter first name!'
            },
            lname: {
                required: 'Please enter last name!'
            },
            country: {
                required: 'Please select country!'
            },
            address: {
                required: 'Please select division address!'
            }
        },
        errorPlacement: function (error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.gender'));
            }
            else if (element.is(":checkbox")) {
                error.appendTo(element.parents('.hobbies'));
            }
            else {
                error.insertAfter(element);
            }

        }
    });
}