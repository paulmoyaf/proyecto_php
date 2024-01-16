
$(document).ready(function() {
    $('#search-input').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: 'index.php',
                type: 'GET',
                data: { q: request.term },
                dataType: 'json',
                success: function(data) {
                    var names = data.map(user => user.firstName);
                    var results = $.ui.autocomplete.filter(names, request.term);
                    response(results.slice(0, 10));
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        },
        select: function(event, ui) {
            $.ajax({
                url: 'index.php',
                type: 'GET',
                data: { q: ui.item.value },
                dataType: 'json',
                success: function(data) {
                    $('#results-container').empty();
                    if (data.length > 0) {
                        data.forEach((user, index) => {
                            setTimeout(() => {
                                $('#results-container').append(`
                                    <div>
                                        <img src="${user.image}" alt="${user.firstName}">
                                        <p>Nombre: ${user.firstName}</p>
                                        <p>Apellido: ${user.lastName}</p>
                                        <p>Edad: ${user.age}</p>
                                        <p>Email: ${user.email}</p>
                                        <p>Color de pelo: ${user.hair.color}</p>
                                    </div>
                                `);
                            }, 500 * index);
                        });
                    } else {
                        $('#results-container').empty();
                        // $('#results-container').append(`
                        //             <div>
                        //                 <p>No hay resultados</p>
                        //             </div>
                        //         `);
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
            return false; // Prevent the widget from inserting the value.
        },
        minLength: 2
    });
});


// Esto es mientras busca automaticamnte
// $(document).ready(function() {
//     $('#search-input').autocomplete({
//         source: function(request, response) {
//             $.ajax({
//                 url: 'index.php',
//                 type: 'GET',
//                 data: { q: request.term },
//                 dataType: 'json',
//                 success: function(data) {
//                     console.log(data);
//                     var names = data.map(user => user.firstName); // Mapea data a un array de nombres de pila
//                     var results = $.ui.autocomplete.filter(names, request.term);
//                     response(results.slice(0, 10)); // Limita los resultados a 10

//                     $('#results-container').empty();
//                     if (data.length > 0) {
//                         data.forEach((user, index) => {
//                             setTimeout(() => {
//                                 $('#results-container').append(`
//                                     <div>
//                                         <img src="${user.image}" alt="${user.firstName}">
//                                         <p>Nombre: ${user.firstName}</p>
//                                         <p>Apellido: ${user.lastName}</p>
//                                         <p>Edad: ${user.age}</p>
//                                         <p>Email: ${user.email}</p>
//                                         <p>Color de pelo: ${user.hair.color}</p>
//                                     </div>
//                                 `);
//                             }, 500 * index); // Delay each result by 500 milliseconds
//                         });
//                     } else {
//                         $('#results-container').empty(); // Clear the container if there are no search results
//                     }
//                 },
//                 error: function(error) {
//                     console.error('Error:', error);
//                 }
//             });
//         },
//         minLength: 2
//     });
// });
