    $( function() {
    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
    return split( term ).pop();
}

    $( "#users" )
    // концентрация на поле при выборе элемента на вкладке
    .on( "keydown", function( event ) {
    if ( event.keyCode === $.ui.keyCode.TAB &&
    $( this ).autocomplete( "instance" ).menu.active ) {
    event.preventDefault();
}
})
    .autocomplete({
    source: function( request, response ) {
    // получаем данные из скрипта, забираем json
    $.getJSON( "search.php", {
    term: extractLast( request.term )
}, response );
},
    search: function() {
    // минимальная длина строки для начала поиска
    var term = extractLast( this.value );
    if ( term.length < 2 ) {
    return false;
}
},
    focus: function() {
    // блокируем вставку значения в фокус, так как значение наше
    return false;
},
    select: function( event, ui ) {
    var terms = split( this.value );
    // удалить текущий ввод
    terms.pop();
    // добавить выбранный элемент
    terms.push( ui.item.value );
    // добавьте заполнитель, чтобы получить запятую и пробел в конце (или любой указанный разделитель)
    terms.push( "" );
    this.value = terms.join( ", " );
    return false;
}
});
} );