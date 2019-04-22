$(document).ready(function() {
$.ajax({
  dataType: 'text',
  url: 'ex3b.sparql',
  success: function(data){
       llamaDBpedia(data);
   }
  });
 
  function llamaDBpedia(q){
    $.ajax({
     dataType: 'json',
     data: {
      query: q,
      format: 'application/sparql-results+json'
     },
     url: 'https://query.wikidata.org/sparql',
     success: function(data){
      $(data.results.bindings).each(function(i, item){
       $("#results").append("<tr><td><a href='"+item.creador.value+"'>"+item.imagen.value+"</a></td></tr>");
      });
     }
   });
 }
});