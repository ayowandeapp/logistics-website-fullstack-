$().ready(function() {
// validate signup form on keyup and submit
$("#registerForm").validate({
    rules: {
        first_name: {
            required: true,
            minlength: 2,
            accept: "[a-zA-Z]+"
        },
        last_name: {
            required: true,
            minlength: 2,
            accept: "[a-zA-Z]+"
        },
        email: {
            required: true,
            email: true,
            //confirm in database if entered email exist before
            /*remote: {
                url: "/check-email",
                type: "get"
            }*/
        },
        password: {
            required: true,
            minlength: 5
        }
    },
    messages: {
        first_name:{
            required: "Please enter a valid name",
            minlength:"nane must be atleast 2 character long",
            accept: "Your name must contain Letters only"
        } ,
        last_name:{
            required: "Please enter a valid name",
            minlength:"nane must be atleast 2 character long",
            accept: "Your name must contain Letters only"
        } ,
        email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address",
            //remote: "Email already exists!"
        },
        password: {
            required: "Please provide your password",
            minlength: "Your password must be at least 5 characters long"
        }


    }
});
$("#loginForm").validate({
    rules: {
        email: {
            required: true,
            email: true,
            //confirm in database if entered email exist before
            /*remote: {
                url: "/check-email",
                type: "get"
            }*/
        },
        password: {
            required: true,
            minlength: 5
        }
    },
    messages: {
        email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address",
            //remote: "Email already exists!"
        },
        password: {
            required: "Please provide your password",
            minlength: "Your password must be at least 5 characters long"
        }


    }
});
$("#forgotPassword").validate({
    rules: {
        email: {
            required: true,
            email: true,
            //confirm in database if entered email exist before
            /*remote: {
                url: "/check-email",
                type: "get"
            }*/
        }
    },
    messages: {
        email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address",
            //remote: "Email already exists!"
        }


    }
});
$("#pickUpForm").validate({
    rules: {
        payment_type: {
            required: true
        },
        first_name: {
            required: true,
            minlength: 2,
            accept: "[a-zA-Z]+"
        },
        last_name: {
            required: true,
            minlength: 2,
            accept: "[a-zA-Z]+"
        },
        state: {
            required: true,
            accept: "[a-zA-Z]+"
        },
        street: {
            required: true,
            accept: "[a-zA-Z]+"
        },
        phone: {
            required: true
        },
        alt_phone: {
            required: true
        },
        order_number: {
            required: true
        },
        govern: {
            required: true
        },
        email: {
            required: true,
            email: true
        }
    },
    messages: {
        payment_type:{
            required: "Please select a payment type"
        } ,

        first_name:{
            required: "Please enter a valid name",
            minlength:"nane must be atleast 2 character long",
            accept: "Your name must contain Letters only"
        } ,
        last_name:{
            required: "Please enter a valid name",
            minlength:"nane must be atleast 2 character long",
            accept: "Your name must contain Letters only"
        } ,
        email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address",
            //remote: "Email already exists!"
        },
        street:{
            required: "Please enter a valid street",
            accept: "Your name must contain Letters only"
        } ,
        state:{
            required: "Please enter a valid state",
            accept: "Your name must contain Letters only"
        } ,
        phone:{
            required: "Please enter a valid phone number"
        } ,
        alt_phone:{
            required: "Please enter a valid phone number"
        } ,
        order_number:{
            required: "Please enter a valid order number"
        } ,
        govern:{
            required: "Please enter a valid local govern."
        }
    }
});
});