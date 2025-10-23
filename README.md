# 🚀 TEMPLATE-BAP - Guide de Gestion de Projet GitHub

Salut les devs ! 👋 Bienvenue dans ce template spécialement conçu pour vos BAP. Ce repo va vous accompagner dans la découverte de la gestion de projet avec GitHub.

Template pour vos projets BAP avec GitHub Projects. Configuration pré-établie pour une gestion de projet efficace.

## 📑 Sommaire

- [📚 Qu'est-ce que c'est ?](#-quest-ce-que-cest-)
- [🎯 Démarrage rapide](#-démarrage-rapide)
- [📊 Organisation](#-organisation)
- [🛠️ Comment utiliser ce template ?](#-comment-utiliser-ce-template-)
- [🎯 GitHub Projects : Votre nouveau meilleur ami](#-github-projects--votre-nouveau-meilleur-ami)
- [📝 Rédiger une issue efficace](#-rédiger-une-issue-efficace)
- [🔄 Workflow de développement complet](#-workflow-de-développement-complet)
- [🛡️ Protection de la branche main](#-protection-de-la-branche-main)
- [🎨 Convention Conventional Commits](#-convention-conventional-commits)
- [🔧 Configuration administrative](#-configuration-administrative)
- [📋 Template de Pull Request](#-template-de-pull-request)
- [📚 Documentation détaillée](#-documentation-détaillée)

---

## 📚 Qu'est-ce que c'est ?

Ce template est votre point de départ pour comprendre et maîtriser :

- 🔗 Le lien entre un repository GitHub et les outils de gestion de projet
- 📊 Les GitHub Projects et leur utilisation
- 🎯 Les bonnes pratiques de gestion de projet en équipe
- 🛠️ L'organisation du workflow de développement

> 💡 **Note importante :** Le template de projet GitHub "BAP-Template-projet" est déjà configuré par l'organisation IIM-CDI. Vous n'avez qu'à l'utiliser !

## 🎯 Démarrage rapide

1. **Créer votre projet** : Utilisez ce template → "Use this template"
2. **Configurer GitHub Project** : Onglet "Projects" → Template "BAP-Template-projet"
3. **Lier automatiquement** : Workflows → Auto-add → `is:issue,pr is:open`

## 📊 Organisation

**7 colonnes pré-configurées :**

- 📂 Toutes les tâches | 📅 Pour jeudi prochain | 🎯 TO DO aujourd'hui
- 🔄 En cours | 👀 Review | ✅ Fini aujourd'hui | 🏆 Terminé

---

**Labels BAP :** `gestion` | `front-end` | `back-end` | `documentation` | `iot`

## 📝 Rédiger une issue

**Format :** `[TYPE] Description claire`

**Obligatoire :**

- Durée : Rapide (<30min) | Normal (30min-2h) | Long (>2h)
- Difficulté : Simple | Moyen | Dur  
- Story Points : 1-2 (simple) | 3-5 (moyen) | 8-13 (complexe)
- Critères d'acceptance (checkboxes)

**Exemple :**

```markdown
[FRONT] Créer page de connexion responsive

- Durée: Normal | Difficulté: Moyen | Points: 5

- [ ] Formulaire HTML5 valide
- [ ] Responsive mobile/desktop
- [ ] Validation côté client
```

## 🔄 Workflow de développement

1. **Issue** → Création avec template approprié
2. **Branche** → `feat/nom-fonctionnalite`
3. **Commits** → Convention : `feat:`, `fix:`, `docs:`, etc.
4. **PR** → Review obligatoire + validation GitHub Actions
5. **Merge** → Protection branche main activée

## 🛡️ Qualité du code

- **Commits :** Convention Conventional Commits obligatoire
- **Branche main :** Protégée, PR + review requis
- **Validation :** GitHub Actions vérifie automatiquement
- **Protection :** Impossible de push direct sur main

## 🛠️ Comment utiliser ce template ?

### 🚀 Étape 1 : Créer votre projet

1. Utilisez ce repository comme template (bouton "Use this template")
2. Créez un nouveau repository pour votre BAP
3. Allez dans l'onglet "Projects" de votre nouveau repo

### 📋 Étape 2 : Utiliser le template de projet de l'organisation

1. Cliquez sur "New project"
2. Sélectionnez le template **"BAP-Template-projet"** dans la liste
3. Le projet se crée automatiquement avec toute la structure ! 🎉

**✨ Tout est déjà configuré :**

- ✅ Les 7 colonnes du workflow BAP
- ✅ Les custom fields (Story Points, Durée, Difficulté, Dates)
- ✅ Les vues et filtres adaptés

### 🔗 Lier automatiquement votre repository au GitHub Project

Pour que toutes les issues et pull requests de votre repo soient ajoutées automatiquement à votre projet :

1. Ouvrez votre GitHub Project
2. Cliquez sur **Workflows** (en haut à droite)
3. Dans le menu à gauche, sélectionnez **Auto-add to project**
4. Cliquez sur les trois petits points (⋯) à droite de la règle
5. Dans les **Filters**, choisissez le repository correspondant à votre projet
6. Dans les critères, mettez : `is:issue,pr is:open`
7. Cliquez sur **Save and turn on**

Ainsi, toutes les issues et PR ouvertes de votre repo seront ajoutées automatiquement à votre tableau de projet !

---

## 🎯 GitHub Projects : Votre nouveau meilleur ami

### Qu'est-ce que GitHub Projects ?

GitHub Projects est l'outil intégré à GitHub qui vous permet de gérer vos projets directement depuis votre repository. Imaginez-le comme un tableau Kanban intelligent qui comprend votre code ! 🧠

### 📋 Avantages du template BAP-Template-projet

🎯 **7 colonnes pré-configurées :**

```
📂 Colonnes du projet :
├── 📋 Toutes les tâches (Vue d'ensemble complète)
├── 📅 Pour jeudi prochain (Objectifs à court terme)
├── 🎯 TO DO aujourd'hui (Focus du jour)
├── 🔄 En cours (Work in progress)
├── 👀 Review (En révision)
├── ✅ Fini aujourd'hui (Accomplissements du jour)
└── 🏆 Tâches finies du projet (Historique complet)
```

🎨 **Custom Fields pré-configurés :**

- **📊 Story Points** : Estimation de la complexité globale (1-2 : simple | 3-5 : moyen | 8-13 : complexe)
- **⏱️ Durée** : Rapide (< 30 min) | Normal (30 min - 2h) | Long (> 2h)
- **🔧 Difficulté technique** : Simple | Moyen | Dur
- **📅 Dates** : Date de début et de fin pour le suivi

🏷️ **Labels spécifiques BAP :**

- 📋 `gestion de projet` | 🎨 `front-end` | ⚙️ `back-end` | 📚 `documentation` | 🔌 `iot`

---

## 📝 Rédiger une issue efficace

### Format standard

**Titre :** `[TYPE] Description claire et précise`

### Champs obligatoires

- **Durée :** Rapide (<30min) | Normal (30min-2h) | Long (>2h)
- **Difficulté :** Simple | Moyen | Dur  
- **Story Points :** 1-2 (simple) | 3-5 (moyen) | 8-13 (complexe)
- **Critères d'acceptance** avec checkboxes

### Exemples d'issues par domaine

#### 📋 Gestion de Projet

```markdown
[GESTION] Organiser le planning Sprint 1

**Description :** Planifier le premier sprint avec objectifs et deadlines

**Durée :** Normal | **Difficulté :** Simple | **Story Points :** 3

**Critères d'acceptance :**
- [ ] Planning défini avec dates claires
- [ ] Tâches réparties équitablement
- [ ] Objectifs SMART définis
```

#### 🎨 Front-End

```markdown
[FRONT] Créer page de connexion responsive

**Description :** Développer la page de connexion avec design responsive

**Durée :** Long | **Difficulté :** Moyen | **Story Points :** 8

**Critères d'acceptance :**
- [ ] Design responsive (mobile/desktop)
- [ ] Validation côté client
- [ ] Tests cross-browser
```

#### ⚙️ Back-End

```markdown
[BACK] Implémenter API d'authentification

**Description :** Créer les endpoints d'authentification JWT

**Durée :** Long | **Difficulté :** Dur | **Story Points :** 13

**Critères d'acceptance :**
- [ ] Endpoints POST /auth/login et /auth/register
- [ ] Validation des données d'entrée
- [ ] Tests unitaires
```

### Exemple d'issue bien rédigée

```markdown
[FRONT] Créer page de connexion responsive

**Description :**
Développer la page de connexion avec design responsive et validation.

**Durée :** Normal | **Difficulté :** Moyen | **Story Points :** 5

**Critères d'acceptance :**
- [ ] Formulaire HTML5 valide
- [ ] Design responsive (mobile/desktop)
- [ ] Validation côté client
- [ ] Tests sur différents navigateurs
```

---

## 🔄 Workflow de développement complet

### Le cycle de vie d'une feature

1. **📝 Création de l'issue**
   - Quelqu'un identifie un besoin → Création d'une issue détaillée

2. **🎯 Planification**
   - Issue ajoutée au projet → Assignation → Estimation

3. **🏗️ Développement**
   - Création de branche → Développement → Commits réguliers

4. **🔍 Review**
   - Pull Request → Review par les pairs → Corrections si nécessaire

5. **✅ Déploiement**
   - Merge → Tests → Fermeture de l'issue

### Conventions de nommage

**Branches :**

```
feat/nom-de-la-fonctionnalité
fix/description-du-bug
chore/correction-urgente
```

**Commits (Convention Conventional Commits) :**

```
feat: ajouter système de connexion
fix: corriger bug de validation
docs: mettre à jour le README
style: corriger l'indentation
refactor: optimiser les requêtes DB
test: ajouter tests unitaires
chore: mettre à jour les dépendances
```

---

## 🛡️ Protection de la branche main

### Règles en place

- 🛡️ **Pull Request obligatoire** : Impossible de push directement sur `main`
- ✅ **Validation des commits** : Tous les commits doivent respecter la convention
- 👥 **Review obligatoire** : Au moins 1 approbation requise
- 🔄 **Branche à jour** : La branche doit être synchronisée avant le merge
- 💬 **Résolution des commentaires** : Tous les commentaires doivent être résolus

### Configuration de protection (pour admins)

Dans **Settings** → **Branches** → **Add rule** pour `main` :

```
☑️ Require a pull request before merging
  ☑️ Require approvals (1 minimum)
  ☑️ Dismiss stale PR approvals when new commits are pushed

☑️ Require status checks to pass before merging
  ☑️ Require branches to be up to date before merging
  ☑️ Status checks: "Validate Commit Messages"

☑️ Require conversation resolution before merging

☐ Allow force pushes (DÉCOCHER)
☐ Allow deletions (DÉCOCHER)
```

### Workflow imposé

1. Créer une branche de feature
2. Développer et committer (avec convention)
3. Ouvrir une Pull Request
4. ✅ GitHub Actions valide automatiquement les commits
5. ✅ Review et approbation d'un pair
6. ✅ Merge possible uniquement si tout est vert

---

## 🎨 Conventional Commits

### Format obligatoire

```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

### Types autorisés

| Type | Description | Exemple |
|------|-------------|---------|
| `feat` | Nouvelle fonctionnalité | `feat(auth): add login system` |
| `fix` | Correction de bug | `fix(api): handle null responses` |
| `docs` | Documentation | `docs: update installation guide` |
| `style` | Style de code | `style: fix indentation` |
| `refactor` | Refactorisation | `refactor(db): optimize queries` |
| `test` | Tests | `test: add user service tests` |
| `chore` | Maintenance | `chore: update dependencies` |
| `perf` | Performance | `perf: optimize loading time` |
| `ci` | CI/CD | `ci: add GitHub Actions workflow` |
| `build` | Build system | `build: configure webpack` |
| `revert` | Annulation | `revert: remove broken feature` |

### Vérification automatique

- ✅ **GitHub Actions uniquement** vérifie automatiquement tous les commits
- ❌ **Les PRs avec des commits non conformes seront bloquées**
- ⚡ **Feedback immédiat** dans les Pull Requests
- 📝 **Commentaires automatiques** avec explications d'erreur

### En cas d'erreur

```bash
# Modifier le dernier commit
git commit --amend -m "feat(auth): add login functionality"

# Modifier plusieurs commits
git rebase -i HEAD~3

# Forcer la mise à jour
git push --force-with-lease
```

---

## 🔧 Configuration administrative

### Vérification post-setup

1. **Créer une branche test :** `git checkout -b test/bad-commit`
2. **Commit avec mauvais format :** `git commit -m "bad message"`
3. **Push et ouvrir PR**
4. ✅ **Vérifier que le workflow échoue**
5. **Modifier le commit :** `git commit --amend -m "test: verify commit validation"`
6. **Push force :** `git push --force-with-lease`
7. ✅ **Vérifier que le workflow passe**

### Dépannage

**Le status check n'apparaît pas :**
1. Vérifier que le workflow `.github/workflows/commitlint.yml` existe
2. Ouvrir une PR de test pour déclencher le workflow
3. Retourner dans Settings → Branches → Refresh la liste

**Le workflow ne se lance pas :**
1. Vérifier la syntaxe YAML du workflow
2. Vérifier les permissions du repository
3. Aller dans Actions → Vérifier les logs

---

## 📋 Template de Pull Request

Chaque PR utilise automatiquement ce template :

### Structure
- **Description** : Changements apportés
- **Type de changement** : Fix, Feature, Documentation, etc.

---

## 📚 Documentation détaillée

Pour aller plus loin, consultez :

- **`.github/ADMIN_SETUP.md`** : Guide de configuration pour les administrateurs
- **`.github/BRANCH_PROTECTION.md`** : Configuration détaillée de la protection des branches
- **`.github/pull_request_template.md`** : Template automatique pour les Pull Requests

Ces fichiers contiennent tous les détails techniques et exemples concrets pour maîtriser la gestion de projet GitHub.

---

**Happy coding ! 🎉**

*Template BAP créé avec ❤️ pour les étudiants de 2ème année coding 🦐*

