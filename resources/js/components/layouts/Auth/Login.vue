<template>
    <v-card class="mx-auto my-12 rounded-xl" max-width="600" elevation="16">
        <v-container>
            <v-card-title primary-title>
                Login
            </v-card-title>
            <validation-observer ref="observer">
                <v-form class="pa-7" @submit.prevent="login">
                    <validation-provider
                        v-slot="{ errors }"
                        name="Email"
                        rules="required|max:25|email"
                        class="text-sm-right"
                    >
                        <v-text-field
                            v-model="form.email"
                            :counter="25"
                            :error-messages="errors"
                            label="Email"
                            type="email"
                            class="text-sm-right my-4"
                            required
                        ></v-text-field>
                    </validation-provider>
                    <validation-provider
                        v-slot="{ errors }"
                        name="Password"
                        rules="required|password"
                    >
                        <v-text-field
                            v-model="form.password"
                            :error-messages="errors"
                            label="Password"
                            type="password"
                            required
                            class="my-4"
                        ></v-text-field>
                    </validation-provider>

                    <v-flex>
                        <v-btn class="mt-3 ml-3 indigo white--text" type="submit">
                        Submit
                    </v-btn>
                    <v-btn class="primary mt-3 mr-3 white--text">
                        <router-link class="white--text text-decoration-none" :to="{name: 'signup'}">Signup</router-link>
                    </v-btn>
                    </v-flex>
                </v-form>
            </validation-observer>
        </v-container>
    </v-card>
</template>

<script>
import { required, email, max } from "vee-validate/dist/rules";
import {
    extend,
    ValidationObserver,
    ValidationProvider,
    setInteractionMode
} from "vee-validate";

setInteractionMode("eager");

extend("required", {
    ...required,
    message: "{_field_} can not be empty"
});

extend("max", {
    ...max,
    message: "{_field_} may not be greater than {length} characters"
});

extend("email", {
    ...email,
    message: "Email must be valid"
});

export default {
    components: {
        ValidationProvider,
        ValidationObserver
    },
    data: () => ({
        errors: null,
        form: {
            email: "",
            password: ""
        }
    }),

    created() {
        if (User.loggedIn()) {
            this.$router.push({ name: "forum" });
        }
    },

    methods: {
        login() {
            // this.$refs.observer.validate()
            User.login(this.form);
            this.$router.push({ name: "forum" });
        },
    }
};
</script>
