angular.module('mainApp')
.service('ImportFontService', function() {

    const WEB_SAFE_FONTS = ["georgia", "palatino linotype", "book antiqua", "palatino", "times new roman", "times", "serif", "sans-serif", "cursive", "arial", "helvetica", "comic sans ms", "impact", "lucida sans unicode", "tahoma", "trebuchet ms", "verdana", "geneva", "courier new", "lucida console"];

    // Returns css string to import the given array of font names
    this.importFonts = function(fonts) {
        var imported = [];
        var str = "";

        for (var i = 0; i < fonts.length; i++) {
            var font = fonts[i].toLowerCase().trim();

            if (WEB_SAFE_FONTS.indexOf(font) == -1 && imported.indexOf(font) == -1){
                imported.push(font);
                var font_name = fonts[i].replace(/\s/g, "+");
                str += "@import url(http://fonts.googleapis.com/css?family=" + font_name + ");\n";
            }
        }
        return str;
    }

});
