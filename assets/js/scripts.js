function sweet (local){
    Swal.fire({
        title: 'Exclusão!',
        text: 'É isso que você realmente quer?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
        
        }).then((result)=>{
        if(result.isConfirmed)
            window.location = local;
          })
}

const btn = document.querySelectorAll("#remove").forEach(x =>
    x.addEventListener('click', function(e){
        e.preventDefault();
        sweet(x.href);
    }));

const flavour = document.querySelectorAll("flavour").forEach(x =>
    x.addEventListener('select', function(e){
        onselect(console.log( x))
    }));
