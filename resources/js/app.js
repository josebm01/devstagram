import Dropzone from 'dropzone'

// para especificar la ruta para enviar las imágenes, no su config por default
Dropzone.autoDiscover = false;


const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: 'Subir imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true, // permite al usuario eliminar la imagen
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    // función que se ejecuta al inicio
    init: function() {
        if ( document.querySelector('[name="imagen"]').value.trim() ) {

            const imagenPublicada = {}
            imagenPublicada.size = 1234
            imagenPublicada.name = document.querySelector('[name="imagen"]').value 

            // configuración de dropzone
            this.options.addedfile.call(this, imagenPublicada)
            this.options.thumbnail.call(
                this, 
                imagenPublicada, 
                `../uploads/${imagenPublicada.name}`
            )

            // añadiendo clases cuando se haya subido correctamente
            imagenPublicada.previewElement.classList.add(
                'dz-success',
                'dz-complete'
            )
        }
    }
})

// evento cuando se está subiendo la imagen
// dropzone.on('sending', function( file, shr, formData ){
//     console.log( file )
// })

dropzone.on('success', function( file, response ){
    // asignando el valor de la imagen al input
    document.querySelector('[name="imagen"]').value = response.img
})

dropzone.on('error', function( file, message ){
    console.log( message )
})

dropzone.on('removedfile', function(){
    // reseteando el value del input
    document.querySelector('[name="imagen"]').value = ""
})