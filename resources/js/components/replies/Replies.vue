<template>
    <div>
        <div class="card" v-for="replie in replies">
            <div class="card-content">
                <span class="card-title">{{replie.user.name}} respondeu:</span>
                <blockquote>{{replie.body}}</blockquote>
            </div>
        </div>

        <div class="card grey lighten-4">
            <div class="card-content">
                <span class="card-title">Responda</span>
                <form @submit.prevent="save()">
                    <div class="input-field">
                        <textarea class="materialize-textarea" rows="10" placeholder="Sua Resposta" v-model="newReplie.body"></textarea>
                    </div>
                    <button class="btn red accent-2" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {forEach} from "lodash";

    export default {
        name: "Replies",
        props: [
            'threadId',
        ],
        data() {
            return {
                replies: {},
                newReplie: {
                    thread_id: this.threadId
                },
            }

        },
        mounted() {
            this.getReplies();

            Echo.channel('new.reply.'+this.threadId)
                .listen('NewReply', event => {
                    if (event.reply) this.getReplies();

                });
        },
        methods: {
            getReplies() {
                window.axios.get('/replies/'+this.threadId)
                    .then(resp => {
                        this.replies = resp.data;
                    }).catch(e => {
                        console.log(e.response)
                })
            },
            save() {
                window.axios.post('/replies', this.newReplie)
                    .then(() => {
                        this.getReplies();
                        this.newReplie = {
                            thread_id: this.threadId
                        };
                        Toastr["success"]('Resposta cadastrada com sucesso');

                    }).catch(e => {
                        forEach(e.response.data.errors, (item) => {
                            Toastr["error"](item);
                        });
                })
            }
        }
    }

</script>

<style scoped>

</style>
