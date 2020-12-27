console.log( jQuery )


var xhttp = new XMLHttpRequest();

// send action var data
var data = {action:'portfolio_read'};
var array = [];
Object.keys(data).forEach(element =>
  array.push(
    encodeURIComponent(element) + "=" + encodeURIComponent(data[element])
  )
);
var body = array.join("&");

xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {

    var response = JSON.parse(this.responseText);

    let parent = document.getElementById('portfolio-loader');

    response.data.objects.forEach( function( o, index ) {

      let row = document.createElement('div');
      let heading = document.createElement('h2');
      let headingText = document.createTextNode( o.title );
      heading.appendChild(headingText);
      row.appendChild(heading);
      parent.appendChild(row);

    });




  }
};

xhttp.open("POST", ajaxurl, true);
xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhttp.send(body);
