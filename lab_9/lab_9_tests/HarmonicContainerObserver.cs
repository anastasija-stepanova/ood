using lab_9.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace lab_9_tests
{
    class HarmonicContainerObserver : IObserverHarmonicContainer
    {
        public bool WasAdding { get; set; }
        public bool WasRemoving { get; set; }
        public int Index { get; set; }

        public HarmonicContainerObserver()
        {
            WasAdding = false;
            WasRemoving = false;
            Index = 0;
        }
        
        public void RemovedHarmonic(int index)
        {
            WasRemoving = true;
            Index = index;
        }

        public void AddedHarmonic(int index)
        {
            WasAdding = true;
            Index = index;
        }
    }
}
