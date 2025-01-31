function doPost(e) {
  var error = null;
  if(typeof e.parameter.source_lang == 'undefined'){
    error = 'source_lang is required';
  }else if(typeof e.parameter.target_lang == 'undefined'){
    error = 'target_lang is required';
  }else if( typeof e.parameter.text == 'undefined'){
    error = 'text is required';
  }else{
    var source_lang = e.parameter.source_lang.trim();
    var source_lang =
  }
}
