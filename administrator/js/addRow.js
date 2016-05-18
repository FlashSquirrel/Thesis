  function add(){
  var tr = document.createElement('tr');
  var cellsNum = tb.rows[0].cells.length;
  for(var j = 0 ; j < cellsNum ; j++){
              var td = document.createElement('td');
              td.innerHTML='test';
              tr.appendChild(td);
       }
       tb.tBodies[0].appendChild(tr);
}