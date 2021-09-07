                        $.validator.addMethod("alpha", function (value, element) {
                            if (/^[a-zA-Z\s]+$/.test(value)) {
                                return true;
                            } else {
                               return false;
                            };
                        }, "Please provide input in alphabets only!");
                        
                        $.validator.addMethod("cemail", function (value, element) {
                            if (/^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value)) {
                                return true;
                            } else {
                                return false;
                            };
                        }, "Please provide a valid email address!");
                        
                        $.validator.addMethod("numeric", function (value, element) {
                            if (/^[0-9]+$/.test(value)) {
                                return true;
                            } else {
                                return false;
                            };
                        }, "Please provide input in digits only!");

                         $.validator.addMethod('selectcheck', function (value) {
                            return (value != '0');
                        }, "Choose a valid option");

                        $.validator.addMethod('filesize', function (value, element, arg) {
                            var minsize=1000; // min 1kb
                            if((value>minsize)&&(value<=arg)){
                                return true;
                            }else{
                                return false;
                            }
                        });