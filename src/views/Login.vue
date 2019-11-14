<template>
    <div class="login">
        <el-form :model="form">
            <el-form-item label="用户名">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="密码">
                <el-input v-model="form.password"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button @click="submitHandle">登录</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script>
    import {SUCCESS, FAIL, HOSTNAME} from "../config/base";

    export default {
        name: "Login",
        data() {
            return {
                form: {
                    name: '',
                    password: ''
                }
            }
        },
        methods: {
            submitHandle() {
                fetch(HOSTNAME + './admin/login/index', {
                    method: 'post',
                    body: JSON.stringify(this.form),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.code == SUCCESS) {
                            this.$message.success(data.msg);
                            sessionStorage.token = data.data.token;
                            this.$router.push({name: 'mains'})
                        } else if (data.code == FAIL) {
                            this.$message.error(data.msg)
                        }
                    })
            }
        }
    }
</script>
<style>
    body {
        width: 100%;
        height: 100%;
        background-image: url("../assets/scene.jpg");
    }
</style>
<style scoped lang="scss">
    $width: 400px;
    $height: 350px;
    @mixin centerMid {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .login {
        width: $width;
        height: $height;
        background-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        padding: 50px;
        @include centerMid
    }
</style>
