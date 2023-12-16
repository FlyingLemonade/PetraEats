
        function logout() {
            fetch('/logout', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '/';
                    } else {
                        console.error('Logout failed');
                    }
                })
                .catch(error => {
                    console.error('Logout error', error);
                });
        }

        function toPesanan() {
            fetch('/mahasiswa/pesanan', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '/mahasiswa/pesanan';
                    } else {
                        console.error('Fail to Move');
                    }
                })
                .catch(error => {
                    console.error('Error Occur', error);
                });
        }

        
        $(document).ready(function(){
            
            $(".image").on("click", function(){
                const form = $(this).closest('form');
                form.submit();
            })
            
        });
