<template>
    <div class="card">
        <div class="card-content">
            <div class="card-title">Tópicos</div>

            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tópico</th>
                    <th class="center-align">Respostas</th>
                    <th class="center-align">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="thread in threads">
                    <td>{{thread.id}}</td>
                    <td>{{thread.title}}</td>
                    <td class="center-align">{{thread.replies.length}}</td>
                    <td class="center-align">
                        <a :href=thread.links.href title="Mostrar">
                            <i class="material-icons">open_in_browser</i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Threads",
        data() {
            return {
                threads: []
            }
        },
        mounted() {
            window.axios.get('/threads')
            .then( response => {
                this.threads = response.data.data;
                console.log(this.threads)
            }).catch( e => {
                console.log(e.error);
            })
        }
    }
</script>

<style scoped>

</style>
