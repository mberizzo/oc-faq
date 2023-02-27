## Usage

```html
<div class="container">
    <h2>
        <a href="{{ 'faq'|page({ slug: null }) }}">Preguntas Frecuentes:</a>
    </h2>

    <ul>
        {% for category in faqCategories %}
            <li>
                <a href="{{ 'faq'|page({ slug: category.slug }) }}">{{ category.name }}</a>
                {% if categorySlug %}
                    <ul>
                        {% for faq in category.questions %}
                            <li>
                                <a href="{{ 'faq'|page({ slug: category.slug }) }}#{{ faq.slug }}">{{ faq.title }}</a> <br>
                                {{ faq.content|raw }}
                            </li>
                        {% endfor %}
                    </ul>
                {% endif %}
            </li>
        {% endfor %}
    </ul>
</div>
```
