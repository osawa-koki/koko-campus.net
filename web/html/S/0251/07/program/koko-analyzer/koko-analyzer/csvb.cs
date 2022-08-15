using Microsoft.Build.Locator;
using Microsoft.CodeAnalysis;
using Microsoft.CodeAnalysis.MSBuild;
using Microsoft.CodeAnalysis.Text;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace kokoAnalyzer
{
    public enum cs_or_vb
    {
        cs = 0,
        vb = 1,
    }
    internal class csvb
    {
        protected cs_or_vb either;
        protected Solution solutionRelatedToWorkspace;
        protected Compilation compiledEntireProject;
        protected SemanticModel semanticModelOfDocument;
        public csvb(cs_or_vb either, Project roslynProject)
        {
            this.either = either;
            this.solutionRelatedToWorkspace = roslynProject.Solution;
            this.compiledEntireProject = roslynProject.GetCompilationAsync().Result;
        }
        async public void setDocument(Document roslynDocument)
        {
            this.semanticModelOfDocument = compiledEntireProject.GetSemanticModel(await roslynDocument.GetSyntaxTreeAsync());
        }
        public virtual void run(Project roslynProject)
        {
        }

    }
}
