using lab9.View;
using System.Collections.Generic;

namespace lab9.Model
{
    public interface IHarmonicContainer : IHarmonicContainerView
    {
        void AddHarmonic( IHarmonic harmonic );
        void RemoveHarmonic( int index );
        List<IHarmonic> GetAllHarmonic();
    }
}
