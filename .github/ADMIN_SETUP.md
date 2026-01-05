# Guide Administrateur - Configuration GitHub

## 🚀 Configuration Rapide

### 1. Protection de Branche (OBLIGATOIRE)

Aller dans **Settings** → **Branches** → **Add rule** pour `main` :

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

### 2. Vérification

1. Créer une branche test : `git checkout -b test/bad-commit`
2. Commit avec mauvais format : `git commit -m "bad message"`
3. Push et ouvrir PR
4. ✅ Vérifier que le workflow échoue
5. Modifier le commit : `git commit --amend -m "test: verify commit validation"`
6. Push force : `git push --force-with-lease`
7. ✅ Vérifier que le workflow passe

### 3. Points d'attention

- **Status check** : Le nom exact est `Validate Commit Messages`
- **Première fois** : Il faut d'abord qu'une PR soit ouverte pour que le status check apparaisse
- **Tests** : Toujours tester avec une vraie PR avant de déployer

## 🔧 Dépannage

### Le status check n'apparaît pas
1. Vérifier que le workflow `.github/workflows/commitlint.yml` existe
2. Ouvrir une PR de test pour déclencher le workflow
3. Retourner dans Settings → Branches → Refresh la liste

### Le workflow ne se lance pas
1. Vérifier la syntaxe YAML du workflow
2. Vérifier les permissions du repository
3. Aller dans Actions → Vérifier les logs

### Les commits passent malgré tout
1. Vérifier que "Require status checks" est coché
2. Vérifier que "Validate Commit Messages" est sélectionné
3. Vérifier que "Require branches to be up to date" est coché

## 📞 Support

En cas de problème, vérifier :
1. Logs GitHub Actions
2. Configuration de protection de branche
3. Syntaxe du fichier `.commitlintrc.json`