<script type="text/javascript">
    document.addEventListener("mousemove",parallax);
    function parallax(e){
        this.querySelectorAll('.layer').forEach(layer => {
            const speed = layer.getAttribute('data-speed')

            const x = (window.innerWidth - e.pageX*speed)/100
            const y = (window.innerHeight - e.pageY*speed)/100

            layer.style.transform = `translateX(${x}px) translateY(${y}px)`
        })
    }
</script>
<script>
    function myFunction(){
        var x = document.getElementById("myInput");
        var y = document.getElementById("myInput2");
        if(x.type == "password" || y.type == "password_confirmation"){
            x.type = "text";
            y.type = "text";
            document.getElementById('hide').style.display = "inline-block";
            document.getElementById('show').style.display = "none";
        }else{
            x.type = "password";
            y.type = "password";
            document.getElementById('hide').style.display = "none";
            document.getElementById('show').style.display = "inline-block";
        }
    }
</script>
