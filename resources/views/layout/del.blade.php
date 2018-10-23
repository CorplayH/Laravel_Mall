<script>
    function del(obj) {
        swal({
            type: "question",
            title:"Are u sure you want to delete it?",
            text: "The data could not be recovered",
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, just do it!',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $(obj).next('form').trigger('submit');
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'The data is safe :)',
                    'error'
                )
            }
        });
    }
</script>
