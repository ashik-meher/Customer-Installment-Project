<template>
    <div>
        <p>Logging Out</p>

    </div>
</template>

<script type="module">

export default {
    mounted(){
        localStorage.removeItem('access_token');
        localStorage.removeItem('user');
        this.$router.push('/login');

        location.reload();
    }
}

</script>

<style scoped>


</style>