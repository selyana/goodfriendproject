<template>
  <div class="container">
    <div class="mt-6 mb-6">
    <h1 class="it-title">
      {{ title }}
    </h1>
    <p class="it-desc">
      {{ desc }}
    </p>
    </div>
    <BecomeForm />
  </div>
</template>

<script>
import BecomeForm from '../components/becomeForm'
export default {
  components: { BecomeForm },
  data () {
    return {
      title: 'Станьте ситтером',
      desc: 'Заполните анкету и получите шанс присоединиться к нашей дружной команде - помогайте хозяевам заботиться о питомцах и найдите новых пушистых друзей.',
    }
  }
}
</script>
