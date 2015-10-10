/*!
 query-string
 Parse and stringify URL query strings
 https://github.com/sindresorhus/query-string
 by Sindre Sorhus
 MIT License
 */
queryString = (function () {

    return {
        "parse": function (str) {
            if (typeof str !== 'string') {
                return {};
            }

            str = str.trim().replace(/^(\?|#)/, '');

            if (!str) {
                return {};
            }

            return str.trim().split('&').reduce(function (ret, param) {
                var parts = param.replace(/\+/g, ' ').split('=');
                var key = parts[0];
                var val = parts[1];

                key = decodeURIComponent(key);
                // missing `=` should be `null`:
                // http://w3.org/TR/2012/WD-url-20120524/#collect-url-parameters
                val = val === undefined ? null : decodeURIComponent(val);

                if (!ret.hasOwnProperty(key)) {
                    ret[key] = val;
                } else if (Array.isArray(ret[key])) {
                    ret[key].push(val);
                } else {
                    ret[key] = [ret[key], val];
                }

                return ret;
            }, {});
        },
        "stringify": function (obj) {
            return obj ? Object.keys(obj).map(function (key) {
                var val = obj[key];

                if (Array.isArray(val)) {
                    return val.map(function (val2) {
                        return encodeURIComponent(key) + '=' + encodeURIComponent(val2);
                    }).join('&');
                }

                return encodeURIComponent(key) + '=' + encodeURIComponent(val);
            }).join('&') : '';
        },
        "formatQueryString": function(currentURL, newQueryStringParams) {
            if(currentURL === undefined || newQueryStringParams === undefined) {
                return;
            }
            var currentURL = currentURL.split('#')[0];
            var queryString = currentURL.split('?')[1];
            var currentParsed = this.parse(queryString);
            var parsed = this.parse(newQueryStringParams);
            var combined = Object.assign(currentParsed, parsed);

            return '?'+this.stringify(combined);

        }
    }
})();
if (!Object.assign) {
    Object.defineProperty(Object, 'assign', {
        enumerable: false,
        configurable: true,
        writable: true,
        value: function(target, firstSource) {
            'use strict';
            if (target === undefined || target === null) {
                throw new TypeError('Cannot convert first argument to object');
            }

            var to = Object(target);
            for (var i = 1; i < arguments.length; i++) {
                var nextSource = arguments[i];
                if (nextSource === undefined || nextSource === null) {
                    continue;
                }
                nextSource = Object(nextSource);

                var keysArray = Object.keys(Object(nextSource));
                for (var nextIndex = 0, len = keysArray.length; nextIndex < len; nextIndex++) {
                    var nextKey = keysArray[nextIndex];
                    var desc = Object.getOwnPropertyDescriptor(nextSource, nextKey);
                    if (desc !== undefined && desc.enumerable) {
                        to[nextKey] = nextSource[nextKey];
                    }
                }
            }
            return to;
        }
    });
}