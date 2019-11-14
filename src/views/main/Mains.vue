<template>
    <el-container style="height: 840px;">
        <el-aside width="200px">
            <el-menu default-active="2" class="el-menu-vertical-demo">
                <el-submenu index="1">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>学生管理</span>
                    </template>
                    <el-menu-item index="1-1"><router-link to="/add">添加学生</router-link></el-menu-item>
                    <el-menu-item index="1-2"><router-link to="/query">查看学生</router-link></el-menu-item>
                </el-submenu>
                <el-submenu index="2">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>教师管理</span>
                    </template>
                    <el-menu-item index="2-1">添加教师</el-menu-item>
                    <el-menu-item index="2-2">查看教师</el-menu-item>
                </el-submenu>
                <el-submenu index="3">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>日报管理</span>
                    </template>
                    <el-menu-item index="3-1">添加日报</el-menu-item>
                    <el-menu-item index="3-2">查看日报</el-menu-item>
                </el-submenu>
                <el-submenu index="4">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>日报可视化</span>
                    </template>
                    <el-menu-item index="4-1"><router-link to="/vcharts">数据可视化</router-link></el-menu-item>
                </el-submenu>
            </el-menu>
        </el-aside>
        <el-container>
            <el-header>
                <el-menu class="el-menu-demo" mode="horizontal">
                    <el-menu-item index="1">处理中心</el-menu-item>
                    <el-submenu index="2">
                        <template slot="title">我的工作台</template>
                        <el-menu-item index="2-1">选项1</el-menu-item>
                        <el-menu-item index="2-2">选项2</el-menu-item>
                        <el-menu-item index="2-3">选项3</el-menu-item>
                    </el-submenu>
                    <el-menu-item index="3">消息中心</el-menu-item>
                    <el-menu-item index="4"><a href="https://www.ele.me" target="_blank">订单管理</a></el-menu-item>
                </el-menu>
                <div style="position: absolute;right: 50px;top: 20px">{{user.username}}</div>
            </el-header>

            <el-main>
                <router-view></router-view>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
    export default {
        name: "Mains",
        data(){
            return{
                user:null
            }
        },
        methods:{
            getuser(){
                this.user=JSON.parse(localStorage.getItem('user'))
            }
        },
        beforeMount() {
            this.getuser();
        }
    }

</script>

<style scoped>
    .el-header, .el-footer {
        background-color: #B3C0D1;
        color: #333;
    }

    .el-aside {
        height: 100vh;
        background-color: #000;
        color: #333;
    }

    .el-main {
        background-color: #E9EEF3;
        color: #333;
    }

    .el-header {
        padding: 0;
    }
    .router-link-exact-active{
        color: #4094fe;
    }
</style>