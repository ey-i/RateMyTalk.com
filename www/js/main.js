var SLIDES = null;
var SPEAKER = null;

function rate(what, how) {

  // reset all to white
  document.getElementById(what+"_good_color").classList.add("hover");
  document.getElementById(what+"_ok_color").classList.add("hover");
  document.getElementById(what+"_bad_color").classList.add("hover");
  document.getElementById(what+"_good").classList.add("default");
  document.getElementById(what+"_ok").classList.add("default");
  document.getElementById(what+"_bad").classList.add("default");

  var old_smily = document.getElementById(what+"_"+how)
  old_smily.classList.remove("default");
  old_smily.classList.add("hidden");

  document.getElementById(what+"_"+how+"_color").classList.remove("hover");

  eval(what.toUpperCase()+" = '"+how+"';");

  var score = -10; // bad bad bad
  if (how == 'good') {
    score = 10;
  } else if (how == 'ok') {
    score = 0;
  } else {
    score = -10; // bad
  }
  
  document.getElementById(what+'_score').value = score;

};

function slides_are(how) {

  rate('slides', how);

};

function speaker_is(how) {

  rate('speaker', how);

};

