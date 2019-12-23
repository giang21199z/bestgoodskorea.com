var NumberHelper = function() {};

NumberHelper.prototype.cash = function(input) {
  return input.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};
