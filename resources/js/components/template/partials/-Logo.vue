<template>
    <div class="sidebar-logo-container">
        <transition name="fade">
            <a :href="logo.href" v-if="!$root.sidebarCollapse"
                class="sidebar-logo d-flex flex-row align-items-center justify-content-center">
                <img v-if="logo" :src="logo.src" class="big_logo" />
            </a>
            <a :href="smalllogo.href" v-else class="sidebar-smalllogo">
                <img v-if="logo" :src="smalllogo.src" style="width: 30px;" />
            </a>
        </transition>
    </div>
</template>

<script>
export default {
    props: ["collapse", "logo", "smalllogo"],
}
</script>

<style lang="scss" scoped>
.sidebar-logo-container {
    position: relative;
    width: 100%;
    padding: 10px;
    line-height: 50px;
    background: #1f212c;
    text-align: center;
    overflow: hidden;

    .big_logo {
        height: 55px;
        width: auto;
    }

    a {
        &:hover {
            text-decoration: unset;
        }
    }
}
</style>