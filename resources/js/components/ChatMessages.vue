
<template>
    <ul  style="max-height:400px;overflow-y: auto;"   v-chat-scroll >

        <li  v-for="message in messages" v-if="message.user !== null">

            <div class="chat-body clearfix" >
                <div class="msg-sent msg-container" v-if="user.id === message.user.id" style="margin-left:90%">
                   <div class="msg-box"  >
                        <div class="inner-box">
                            <div class="name" style="color: #286090">
                              appartement  {{ message.user.app_num }}
                            </div>
                            <div class="meg">
                                <p style="color: #666363">{{ message.message }}</p>
                                 {{ message.created_at }}
                            </div>
                        </div>
                    </div>
               

                </div>



                <div class="msg-received msg-container "  v-else-if="user.id !== message.user.id" style="margin-left: 0px" >
                     <div class="msg-box"  >
                        <div class="inner-box ">
                            <div class="name" style="color: #286090">
                                appartement  {{ message.user.app_num }}
                            </div>
                            <div class="meg">
                                <p style="color: #666363">{{ message.message }}</p>
                                 {{ message.created_at }}
                            </div>
                        </div>
                    </div>
                  
            </div>

            </div>
            <div class="chat-body clearfix" v-if="message.user === null">
                ----------------------------
            </div>

        </li>
    </ul>
</template>

<script>

  export default {
    props: ['messages','user']
  };

</script>