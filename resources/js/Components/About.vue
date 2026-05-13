<template>
    <div class="about-exact-root py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    
                    <div v-for="(section, index) in processedSections" :key="index">
                        <section class="editorial-section">
                            <div class="editorial-paragraph">
                                <p>
           <span class="first-word">{{ section.firstWord }}</span>
                                <span class="body-text">{{ section.restOfText }}</span>
                                </p>
                     
                            </div>
                        </section>

                        <hr v-if="index < processedSections.length - 1" class="section-divider">
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    about: Object
});

const processedSections = computed(() => {
    if (!props.about?.description) return [];

    // Clean text and force "Our" and "We" into new array items
    let cleanText = props.about.description.replace(/<[^>]*>?/gm, '').trim();
    let splitText = cleanText
        .replace(/\b(Our)\b/g, "SPLIT_HERE Our")
        .replace(/\b(We)\b/g, "SPLIT_HERE We");

    const paragraphs = splitText
        .split(/SPLIT_HERE|\n\n/)
        .map(p => p.trim())
        .filter(text => text.length > 0);

    return paragraphs.map(text => {
        const words = text.split(/\s+/);
        return {
            firstWord: words[0], 
            restOfText: words.slice(1).join(' ') 
        };
    });
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@300&family=Montserrat:wght@300;400&display=swap');

.about-exact-root {
    background-color: #ffffff;
}

.editorial-section {
    padding: 10px 0;
    display: flow-root; /* Fixes container height for floated elements */
}

.editorial-paragraph {
    margin: 0;
    text-align: left;
}

.first-word {
    font-family: 'Playfair Display', serif;
    font-size: 2rem; /* Makes it "Greater" */
    font-weight: 300;
    color: #7a7571;
    float: left;
    /* CRITICAL ALIGNMENT: line-height pulls the word up to the top of the line */
    line-height: 0.75; 
    margin-right: 18px;
  
}

.body-text {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9rem;
    line-height: 1.8; /* Elegant spacing for the paragraphs */
    color: #7a7571;
    font-weight: 400;
    letter-spacing: 0.3px;
    /* This ensures the rest of the text wraps underneath the big word */
    display: inline;
}

.section-divider {
    border: 0;
    border-top: 1px solid #eeeeee;
    margin: 25px 0;
    clear: both;
}

@media (max-width: 768px) {
    .first-word {
        font-size: 1.5rem;
        line-height: 0.8;
        margin-right: 12px;
    }
    .body-text {
        font-size: 0.85rem;
    }
}
</style>