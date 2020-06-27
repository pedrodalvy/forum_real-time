<template>
    <div class="card">
        <div class="card-content">
            <span class="card-title">Tópicos</span>

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

        <div class="card-content">
            <div class="card-title">Novo Tópico</div>

            <form @submit.prevent="save()">
                <div class="input-field">
                    <input type="text" placeholder="Título" v-model="newThread.title">
                </div>
                <div class="input-field">
                    <textarea class="materialize-textarea" placeholder="Conteúdo"
                              v-model="newThread.body"></textarea>
                </div>
                <button type="submit" class="btn red accent-2">Enviar</button>
            </form>
        </div>
    </div>
</template>

<script>
    import {forEach} from "lodash";

    export default {
        name: "Threads",
        data() {
            return {
                threads: [],
                newThread: {},
            }
        },
        mounted() {
            this.getThreads();

            Echo.channel('new.thread')
                .listen('NewThread', event => {
                    if (event.thread) this.getThreads();
            });

        },
        methods: {
            getThreads() {
                window.axios.get('/threads')
                    .then(response => {
                        this.threads = response.data.data;

                    }).catch(e => {
                    console.log(e.error);
                })
            },
            save() {
                window.axios.post('/threads', this.newThread)
                    .then(resp => {
                        this.getThreads();
                        this.newThread = {};
                        Toastr["success"]('Tópico inserido com sucesso.');

                    }).catch(e => {
                        forEach(e.response.data.errors, (item) => {
                            Toastr["error"](item);
                        });
                });
            }
        }
    }
</script>

<style scoped>

</style>
