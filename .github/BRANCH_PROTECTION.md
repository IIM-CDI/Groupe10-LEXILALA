# Configuration de Protection de Branche - GitHub

Ce document décrit la configuration nécessaire pour protéger la branche `main` et s'assurer que les commits respectent les conventions.

## ⚙️ Configuration de Protection de Branche

### 1. Protection générale de la branche `main`

Dans GitHub, aller dans **Settings** > **Branches** > **Add rule** pour la branche `main` :

#### ✅ Règles à activer :

- **Require a pull request before merging** ✅
  - Require approvals: `1` minimum
  - Dismiss stale PR approvals when new commits are pushed ✅
  - Require review from code owners ✅ (si fichier CODEOWNERS existe)

- **Require status checks to pass before merging** ✅
  - Require branches to be up to date before merging ✅
  - **Status checks requis** :
    - `Validate Commit Messages` (de notre workflow commitlint.yml)

- **Require conversation resolution before merging** ✅

#### 🔒 Restrictions d'accès :

- **Allow force pushes** ❌ (interdire)

- **Allow deletions** ❌ (interdire)

## 🎯 Points Clés pour la Validation des Commits

### Status Check Critique
Le plus important est d'ajouter **`Validate Commit Messages`** comme status check requis. Cela correspond au nom de notre job dans `.github/workflows/commitlint.yml` :

```yaml
jobs:
  commitlint:
    name: Validate Commit Messages  # ← Ce nom doit être dans les status checks
```

### Workflow de Validation
1. Développeur crée une branche de feature
2. Développeur fait des commits (validation locale optionnelle)
3. Développeur ouvre une Pull Request
4. GitHub Actions exécute automatiquement `commitlint.yml`
5. Si les commits ne respectent pas la convention → ❌ Status check échoue
6. La PR ne peut pas être mergée tant que les commits ne sont pas conformes
7. Une fois conforme → ✅ Status check passe → Merge possible

## 🚨 Messages d'Erreur Automatiques

Notre workflow commente automatiquement les PR en cas d'échec avec :
- ❌ Explication de l'erreur
- 📋 Guide des types de commits autorisés
- ✅ Exemples de commits valides
- 🔗 Liens vers la documentation

## 🛠️ Pour les Administrateurs

### Étapes de Configuration :

1. **Aller dans le repository GitHub**
2. **Settings** → **Branches**
3. **Add rule** pour la branche `main`
4. **Cocher toutes les options listées ci-dessus**
5. **Dans "Status checks"**, rechercher et sélectionner : `Validate Commit Messages`
6. **Save changes**

### Vérification :
- Créer une branche de test
- Faire un commit avec un mauvais format (ex: `bad commit message`)
- Ouvrir une PR → Vérifier que la validation échoue
- Modifier le commit avec un bon format (ex: `feat: add test feature`)
- Vérifier que la validation passe

## 📝 Notes Importantes

- La validation se fait **uniquement sur GitHub**, pas en local
- Les contributeurs n'ont **aucune dépendance** à installer
- Les messages d'erreur sont **automatiques** et **explicites**
- L'historique Git reste **propre** grâce à `required_linear_history`