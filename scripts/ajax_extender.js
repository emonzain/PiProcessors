var ajax_extender_setup = function()
{
    var jqAjax = $.ajax;

    $.extend({
        oriJqAjax : jqAjax,
        ajax: function (options) {
            options = $.extend(options, {
                ext_success: options.success,
                ext_error: options.error,
                success : function(data, status, jqhr)
                {
                    if (data.status != undefined && data.status != null) {
                        if (data.status === "success") {
                            if (options.ext_success != undefined && options.ext_success != null)
                                options.ext_success.call(this, data, status, jqhr);
                        }
                        else {
                            var messages = $.map(data.errors, function (item) {
                                return item.Message;
                            });

                            ErrorMessages(messages);
                            if (options.ext_error != undefined && options.ext_error != null)
                                options.ext_error.call(this, jqhr, status, data);
                        }
                    }
                    else
                    {
                        if (options.ext_success != undefined && options.ext_success != null)
                            options.ext_success.call(this, data, status, jqhr);
                    }
                },
                error : function (XMLHttpRequest, textStatus, errorThrown)
                {
                    if (options.ext_error != undefined && options.ext_error != null)
                        options.ext_error.call(XMLHttpRequest, textStatus, errorThrown);
                }
            });

            return $.oriJqAjax(options);
        }
    });

   

}

$(document).ready(function () {
    ajax_extender_setup();
});
