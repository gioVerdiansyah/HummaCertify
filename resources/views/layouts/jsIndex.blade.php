<script>
    $('#email').on('input', function () {
        let emailInput = $(this);
        let warningText = emailInput.next('.text-warning');
        handleInput(emailInput, warningText);
    });

    function handleInput(input, warningText) {
        let parentDiv = input.parent();
        if (input.val().trim() === '') {
            warningText.removeClass('d-none');
            parentDiv.removeClass('mb-4');
        } else {
            warningText.addClass('d-none');
            parentDiv.addClass('mb-4');
        }
    }
</script>
<script>
 $(document).ready(function() {
$("form[name='myform']").submit(function(event){
    event.preventDefault();
    var name = $(this).find("input[name='name']").val();
    var nomor_induk = $(this).find("input[name='nomor_induk']").val();
    var ttl = $(this).find("input[name='ttl']").val();
    var institusi = $(this).find("input[name='institusi']").val();
    var kategori = $(this).find("input[name='certificate_categori_id']").val();
    var bidang = $(this).find("input[name='bidang']").val();
    var instruktur = $(this).find("input[name='instruktur']").val();

    if(name === ""){
        Swal.fire({
            title: 'Peringatan',
            text: 'Nama tidak boleh kosong',
            icon: 'warning',
        });
        return;
    }
    if(instruktur === ""){
        Swal.fire({
            title: 'Peringatan',
            text: 'instruktur tidak boleh kosong',
            icon: 'warning',
        });
        return;
    }
    if(bidang === ""){
        Swal.fire({
            title: 'Peringatan',
            text: 'bidang  tidak boleh kosong',
            icon: 'warning',
        });
        return;
    }
    if(kategori === ""){
        Swal.fire({
            title: 'Peringatan',
            text: 'Kategori tidak boleh kosong',
            icon: 'warning',
        });
        return;
    }
    if(institusi === ""){
        Swal.fire({
            title: 'Peringatan',
            text: 'institusi tidak boleh kosong',
            icon: 'warning',
        });
        return;
    }
    if(nomor_induk === ""){
        Swal.fire({
            title: 'Peringatan',
            text: 'nomor induk tidak boleh kosong',
            icon: 'warning',
        });
        return;
    }
    if(ttl === ""){
        Swal.fire({
            title: 'Peringatan',
            text: 'tempat tanggal lahir tidak boleh kosong',
            icon: 'warning',
        });
    }
    else {
        document.getElementById('loading').style.display = 'flex';
        this.submit();
    }
});
});
</script>
