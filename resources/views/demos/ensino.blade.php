<article class="project-panel panel-ensino" id="demo-ensino" role="tabpanel" aria-labelledby="tab-ensino" hidden>
    <div class="project-info">
        <h3>Plataforma de Ensino</h3>
        <p>Sistema administrativo para gerenciar alunos, cursos e matrículas, com arquitetura MVC em PHP e testes com PHPUnit.</p>
        <ul class="stack" aria-label="Tecnologias da Plataforma de Ensino">
            <li>PHP 8.2</li><li>MySQL</li><li>Docker</li><li>PHPUnit</li>
        </ul>
        <a class="project-link" href="https://github.com/GiltMonster/plataforma-ensino">Código no GitHub</a>
    </div>
    <div class="demo-window" aria-label="Demonstração da Plataforma de Ensino">
        <div class="window-bar"><strong>Matrículas</strong><span class="demo-tag">Demo</span></div>
        <div class="demo-body">
            <label class="search-label">Buscar por aluno ou curso
                <input type="search" id="ensino-search" placeholder="Ex.: Rafaela">
            </label>
            <div class="table-wrap">
                <table class="enrollment-table">
                    <thead><tr><th scope="col">Aluno</th><th scope="col">Curso</th></tr></thead>
                    <tbody id="ensino-list"></tbody>
                </table>
            </div>
            <form id="ensino-form" class="enrollment-form">
                <h4>Nova matrícula</h4>
                <div class="enrollment-fields">
                    <label>Aluno<select id="ensino-student" required></select></label>
                    <label>Curso<select id="ensino-course" required></select></label>
                </div>
                <button class="button demo-button" type="submit">Matricular aluno</button>
            </form>
            <div class="demo-result" id="ensino-result" role="status" hidden></div>
        </div>
    </div>
</article>
