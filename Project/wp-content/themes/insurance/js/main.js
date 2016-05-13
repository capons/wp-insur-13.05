var main = (function () {
    doConstruct = function () {
        this.init_callbacks = [];
    };
    doConstruct.prototype = {
        add_init_callback : function (func) {
            if (typeof(func) == 'function') {
                this.init_callbacks.push(func);
                return true;
            }
            else {
                return false;
            }
        }
    };
    return new doConstruct;
})();
$(document).ready(function () {
    $.each(main.init_callbacks, function (index, func) {
        func();
    });
});
var news = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.show_modal);
        main.add_init_callback(this.validate_form);
    };
    doConstruct.prototype = {
        show_modal: function () {
                $('#b-money').click(function(){
                    $("#insur_case").modal('show');
                });
                $('#b-tool').click(function(){
                    $("#insur_case").modal('show');
                });
                $('#b-agent').click(function(){
                    $("#insur_case").modal('show');
                });
        },
        validate_form: function () {
            $("#insurenc-cf").submit(function(event){
                var name = $("[name='your-name']").val();
                var email = $("[name='your-email']").val();
                if (email.length == 0) {
                    event.preventDefault();
                    $('#error-form').css('display','block');
                    $('#insert-m').html(' Required email');
                }
                if (email.indexOf('.', 0) == -1 || new_email.indexOf('@', 0) == -1) {
                    event.preventDefault();
                    $('#error-form').css('display','block');
                    $('#insert-m').html(' Invalid email');
                }
                if (name.length == 0) {
                    event.preventDefault();
                    $('#error-form').css('display','block');
                    $('#insert-m').html(' Required name');
                }
            })
        },
    };
    return new doConstruct;
})();

