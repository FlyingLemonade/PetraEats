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


    fetch('/kantin/pesanan', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
    })
    .then(response => {
        if (response.ok) {
            window.location.href = '/kantin/pesanan';
        } else {
            console.error('Fail to Move');
        }
    })
    .catch(error => {
        console.error('Error Occur', error);
    });
        
}