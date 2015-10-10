var iim = iim || Object.create(null);
iim.request = (function($, document, window, undefined) {

    var body = $('body'),
        itemCallbacks = {},//Callbacks for individual items (e.g buttons, forms etc.)
        itemConfigs = {},//Request configurations for individual items (e.g buttons, forms etc.)
        defaults = {
            ajax : true,
            post : true,
            json : true,
            data : {},
            callback : function(response){}//Callback for every time a request occurs
        };

    body.on('submit', 'form.request', function(e) {requestAutomation(e, this)});
    body.on('click', 'a.request', function(e) {requestAutomation(e, this)});

    function ajax(url, options, callback) {

        options = $.extend({}, defaults, options);

        var localCallback = function(response) {
            options.callback(response);
            if (typeof callback === 'function') {
                callback(response);
            }
        };
        
        if (options.post) {
            
            if (options.json) {
                $.post(url, options.data, localCallback, 'json');
            } else {
                $.post(url, options.data, localCallback);
            }

        } else {

            if (options.json) {
                $.get(url, options.data, localCallback, 'json');
            } else {
                $.get(url, options.data, localCallback);
            }

        }

    }

    function transfer(url, options) {

        options = $.extend({}, defaults, options);

        if (options.post) {

            var form = $("<form action='" + url + "' method='post'></form>"),
                data = options.data;

            //@TODO: Fix this. The optional serialized string feature doesn't work
            if (typeof data == 'string') {

                var split = options.data.split('&');
                for(var i = 0; i < split.length; i++){
                    var kv = split[i].split('=');
                    data[kv[0]] = decodeURIComponent(kv[1] ? kv[1].replace(/\+/g, ' ') : kv[1]);
                }

            }

            $.each(data, function(key, value) {

                form.append("<input type='hidden' name='" + key + "' value='" + value + "'/>");

            });

            form.submit();

        } else {

            if (typeof options.data == 'string') {

                window.location = url + '?' + options.data;

            } else {

                window.location = url + '?' + $.param(options.data);

            }

        }

    }

    function request(url, options, callback) {

        options = $.extend({}, defaults, options);

        if (options.ajax) {

            ajax(url, options, callback);

        } else {

            transfer(url, options);

        }

    }

    function applyItemCallbacks(response,e,alias) {
        if (alias == undefined || alias == false) {return false;}
        var callbacks = itemCallbacks[alias];
        if (callbacks !== undefined) {
            $.each(callbacks, function(key, callback) {
                callback(response,e);
            });
        }
    }

    function loadItemRequestOptions(alias) {
        if (alias == undefined || alias == false) {return {};}
        if (itemConfigs[alias] == undefined) {return {};}
        return itemConfigs[alias];
    }

    function requestAutomation(e, element) {

        e.preventDefault();

        var data = {},
            self = $(element),
            url = '',
            method = '',
            type = self.attr('data-request-type'),
            json = self.attr('data-request-response-type');
            type = type || 'ajax';
            json = json || 'json';

        if (e.type == 'submit') {
            data = self.serialize();
            url = self.attr('action');
            method = self.attr('method');
        } else {
            url = self.attr('href');
            method = self.attr('data-request-method');
        }

        method = method || 'post';

        //If the request type is not ajax then this is the last chance we have to call the callbacks.
        if (type != 'ajax') {applyItemCallbacks(e,self.attr('data-item-alias'))}

        var options = loadItemRequestOptions(self.attr('data-item-alias'));
            options = $.extend({ajax : type == 'ajax',json : json == 'json',post : method == 'post',data : data},options);

        //Send the request
        request(url, options, function(response) {

            //But if the request is ajax it makes more sense to call the callbacks here :)
            applyItemCallbacks(response,e,self.attr('data-item-alias'));

        });

    }

    return {
        setItemRequestOptions : function(alias,options) {
            if (itemConfigs[alias] == undefined) {
                itemConfigs[alias] = $.extend({}, defaults, options);
            } else {
                $.extend(itemConfigs[alias], options);
            }
            return this;
        },
        setItemCallback : function(alias,callback) {
            itemCallbacks[alias] = itemCallbacks[alias] || [];
            itemCallbacks[alias].push(callback);
            return this;
        },
        request : function(url,options, callback) {
            request(url, options, callback);
            return this;
        },
        transfer : function(url,options) {
            transfer(url, options);
            return this;
        },
        ajax : function(url,options,callback) {
            ajax(url, options, callback);
            return this;
        },
        defaults : function(newDefaults) {
            defaults = $.extend({}, defaults, newDefaults);
            return this;
        }
    }

})(jQuery, document, window);