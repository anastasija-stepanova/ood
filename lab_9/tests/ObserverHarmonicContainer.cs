﻿using lab9.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace lab9_tests
{
    public class HarmonicContainerObserver : IObserverHarmonicContainer
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

        public void AddedNewHarmonic( int index )
        {
            WasAdding = true;
            Index = index;
        }

        public void RemovedHarmonic( int index )
        {
            WasRemoving = true;
            Index = index;
        }
    }
}
