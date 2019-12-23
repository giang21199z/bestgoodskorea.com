var Waiting = function(rootElm) {
  this.rootElm = rootElm;
  this.template = '<div class="waiting-container" id="waiting_container"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>';
  this.rootElm.style.position = 'relative';
  $(this.rootElm).append(this.template);
}

Waiting.prototype.show = function() {
  this.rootElm.querySelector('#waiting_container').className = "waiting-container show";
}

Waiting.prototype.hide = function() {
  this.rootElm.querySelector('#waiting_container').className = "waiting-container";
}