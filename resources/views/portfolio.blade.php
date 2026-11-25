<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfólio de Lucas Santos, desenvolvedor PHP e Laravel. Explore demos interativas de Assistant, Bravo e Plataforma de Ensino.">
    <meta name="theme-color" content="#f8f7f2">
    <meta property="og:title" content="Lucas Santos · Desenvolvedor PHP">
    <meta property="og:description" content="Desenvolvimento web, integrações e projetos interativos.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://lucassc.dev/">
    <link rel="canonical" href="https://lucassc.dev/">
    <link rel="icon" type="image/png" href="/assets/favicon.png">
    <link rel="stylesheet" href="/assets/portfolio.css">
    <script type="module" src="/assets/portfolio.js"></script>
    <title>Lucas Santos · Desenvolvedor PHP</title>
</head>
<body>
    <a class="skip-link" href="#conteudo">Pular para o conteúdo</a>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="#inicio" aria-label="lucassc.dev, início">
                <span class="brand-mark" aria-hidden="true">LS</span>
                <span>lucassc.dev</span>
            </a>
            <nav aria-label="Navegação principal">
                <a href="#projetos">Projetos</a>
                <a href="#experiencia">Experiência</a>
                <a class="nav-contact" href="#contato">Contato</a>
            </nav>
        </div>
    </header>
    <main id="conteudo">
        <section class="container hero" id="inicio" aria-labelledby="intro-title">
            <div class="hero-copy">
                <p class="eyebrow">Desenvolvedor full stack</p>
                <h1 id="intro-title">Lucas<br>Santos<span>.</span></h1>
                <p class="hero-intro">Desenvolvo aplicações web e integrações com <strong>PHP e Laravel</strong>. Minha experiência com QA faz parte de como eu escrevo, testo e entrego software.</p>
                <div class="hero-actions">
                    <a class="button button-primary" href="#projetos">Testar as demos</a>
                    <a class="button" href="https://github.com/GiltMonster">GitHub</a>
                </div>
            </div>
            <div class="hero-art">
                <div class="terminal" aria-label="Tecnologias de Lucas">
                    <div class="terminal-bar">
                        <span class="terminal-dots" aria-hidden="true"><i></i><i></i><i></i></span>
                        <span>~/lucassc.dev</span>
                    </div>
                    <div class="terminal-body">
                        <span class="terminal-command"><b aria-hidden="true">$</b> stack</span>
                        <dl>
                            <div><dt>Back-end</dt><dd>PHP · Laravel</dd></div>
                            <div><dt>Front-end</dt><dd>Angular · Ionic</dd></div>
                            <div><dt>Dia a dia</dt><dd>Linux · SSH · CI</dd></div>
                        </dl>
                        <span class="terminal-cursor" aria-hidden="true"></span>
                    </div>
                </div>
                <span class="art-star" aria-hidden="true">✳</span>
            </div>
        </section>

        <section class="projects-section" id="projetos" aria-labelledby="projects-title">
            <div class="container">
                <div class="section-heading">
                    <h2 id="projects-title">Projetos na prática</h2>
                    <p>Experimente um recorte de cada projeto. As demos usam dados fictícios.</p>
                </div>
                <div class="project-tabs" role="tablist" aria-label="Selecionar projeto">
                    <button type="button" role="tab" id="tab-assistant" aria-controls="demo-assistant" aria-selected="true" data-project="assistant">Assistant</button>
                    <button type="button" role="tab" id="tab-bravo" aria-controls="demo-bravo" aria-selected="false" tabindex="-1" data-project="bravo">Bravo</button>
                    <button type="button" role="tab" id="tab-ensino" aria-controls="demo-ensino" aria-selected="false" tabindex="-1" data-project="ensino">Plataforma de Ensino</button>
                </div>
                @include('demos.assistant')
                @include('demos.bravo')
                @include('demos.ensino')
                <noscript><p class="no-script">Ative o JavaScript para testar as demonstrações interativas.</p></noscript>
            </div>
        </section>

        <section class="container experience" id="experiencia" aria-labelledby="experience-title">
            <div class="section-heading">
                <h2 id="experience-title">Experiência</h2>
                <p>Desenvolvimento web, integrações e qualidade de software.</p>
            </div>
            <div class="experience-grid">
                <article class="experience-card experience-current">
                    <span class="experience-company">Receiv · cargo atual</span>
                    <h3>Desenvolvedor PHP</h3>
                    <p>Integrações com WhatsApp Business usando Meta Business e Meta for Developers. Pipelines no Bitbucket e acesso diário a servidores Linux via SSH para investigar falhas.</p>
                    <ul class="stack" aria-label="Tecnologias">
                        <li>Laravel</li><li>WhatsApp Business</li><li>Linux e SSH</li>
                    </ul>
                </article>
                <article class="experience-card">
                    <span class="experience-company">Receiv</span>
                    <h3>Qualidade de software</h3>
                    <p>Testes funcionais e de regressão, validação de APIs, automação em Python e acompanhamento de defeitos.</p>
                    <ul class="stack" aria-label="Tecnologias"><li>Python</li><li>Testes de API</li></ul>
                </article>
                <article class="experience-card">
                    <span class="experience-company">Centro de Inovação e Tecnologia do Senac</span>
                    <h3>Desenvolvimento full stack</h3>
                    <p>Desenvolvimento e refatoração de um aplicativo mobile para eventos online com Angular, Ionic e Firebase.</p>
                    <ul class="stack" aria-label="Tecnologias"><li>Angular</li><li>Ionic</li><li>Firebase</li></ul>
                </article>
            </div>
        </section>
    </main>
    <footer id="contato" class="site-footer">
        <div class="container footer-inner">
            <div>
                <h2>Contato</h2>
                <p>Lucas Santos · São Paulo, SP</p>
            </div>
            <div class="footer-links">
                <a class="button button-primary" href="mailto:lucassantoslukas2@gmail.com">Enviar e-mail</a>
                <a class="button" href="https://www.linkedin.com/in/LucasSantosC">LinkedIn</a>
                <a class="button" href="https://github.com/GiltMonster">GitHub</a>
            </div>
        </div>
    </footer>
</body>
</html>
