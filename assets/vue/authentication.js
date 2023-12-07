const { createApp } = Vue;

createApp({
    data(){
        return{
            fullname: '',
            lastname: '',
            email: '',
            password: '',
            confirmPassword: '',
            checked: '',
            code: '',
        }
    },
    methods:{
        login:function(){
            const vue = this;
            var data = new FormData();
            data.append("Method","login");
            data.append("email", vue.email);
            data.append("password", vue.password);
            axios.post('Backend/mainRoutes.php',data)
            .then(function(r){
                if(r.data == 1){
                    window.location.href = "frontend/index.php";
                }else if(r.data == 2){
                    window.location.href = "frontend/admin/index.php";
                }else{
                    alert("No data existed!");
                }
            });
        },
        register:function(){
            const vue = this;
            if(vue.password == vue.confirmPassword){
                var data = new FormData();
                data.append("Method","register");
                data.append('fullname', vue.lastname +", "+ vue.fullname);
                data.append('email', vue.email);
                data.append('password', vue.password);
                axios.post('Backend/mainRoutes.php',data)
                .then(function(r){ 
                    if(r.data == 200){
                        window.location.href = "login.php";
                    }else{
                        alert('Email is already registered');
                    }
                });
            }else{
                alert('Password not match!');
            }
            
        },
        forgotPassword: function(){
            const vue = this;
            var data = new FormData();
            data.append("Method","changePasswordUsingGmail");
            data.append('email', vue.email);
            axios.post('Backend/mainRoutes.php',data)
            .then(function(r){ 
                window.location.href = "login.php";
            });
        },
        changePassword: function(){
            const vue = this;
            if(vue.password == vue.confirmPassword){
                var data = new FormData();
                data.append("Method","changePasswordAuth");
                data.append('password', vue.password);
                data.append('code', document.getElementById('code').value);
                axios.post('Backend/mainRoutes.php',data)
                .then(function(r){ 
                    if(r.data == 200){
                        window.location.href = "login.php";
                    }
                });
            }else{
                alert('Password not match!');
            }
        }
    },
    created:function(){

    }
}).mount('#authentication-vue')