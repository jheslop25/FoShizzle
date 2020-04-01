<template>
    <div>
        <Header/>
        <Content/>
        <Footer/>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import Content from './Content.vue';
    import Footer from './Footer.vue';

    export default {
        name: 'Market',
        components: {
            Header,
            Content,
            Footer
        }
    }
</script>

<style lang="scss" scoped>



</style>