<template>
    <div>
        <ul class="accordion-menu">
        <li>
            <router-link to="/home">
                <i class="menu-icon icon-home4"></i><span>Dashboard</span>
            </router-link>
        </li>
        <li v-for="menu in permission" :key="menu.id" v-if="permission.length && menu.read" >
            <router-link :to="menu.name">
                <i class="menu-icon icon-home4"></i><span>{{ menu.resouresName }}</span>
            </router-link>
        </li>
        <li>
            <router-link to="/role">
                <i class="menu-icon icon-home4"></i><span>Role Management</span>
            </router-link>
        </li>
        <li>
            <router-link to="/assingrole">
                <i class="menu-icon icon-home4"></i><span>Assing Role</span>
            </router-link>
        </li>
    </ul>
    </div>
</template>

<script>
    export default {
        props: ['user','permission'],
    }
</script>
