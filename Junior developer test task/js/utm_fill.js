$(function() {
  let url = new URL(window.location.href)
  let params = new URLSearchParams(url.search.slice(1));
  for (let key of params.keys()) {
    let value = params.get(key);
    if (value != undefined && value != "") {
      $("[name=" + key + "]").val(value);
    }
  }
})
